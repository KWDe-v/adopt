<?php
require_once "config.php";



$user = $_SESSION["usuario"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailatual = $_POST["emailatual"];
    $emailnovo = $_POST["emailnovo"];
    $confirmaremailnovo = $_POST["confemailnovo"];
    $senhaatual_email = $_POST["senhaatual_email"];

    if (empty($emailatual) || empty($emailnovo) || empty($confirmaremailnovo) || empty($senhaatual_email)) {
        echo "<p class='messageError'>Por favor, preencha todos os campos.</p>";
    } elseif ($emailnovo != $confirmaremailnovo) {
        echo "<p class='messageError'>Novo email e confirmação não correspondem!</p>";
    } elseif (!filter_var($emailnovo, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='messageError'>Por favor, insira um email válido.</p>";
    } else {
        $sql_check_email = "SELECT email FROM usuarios WHERE email = '$emailnovo'";
        $result_check_email = $conn->query($sql_check_email);

        if ($result_check_email->num_rows > 0) {
            echo "<p class='messageError'>Este email já está cadastrado. Escolha outro email.</p>";
        } else {


            $sql = "SELECT senha FROM usuarios WHERE usuario = '$user'";
            $resultado = $conn->query($sql);
            $senha = $resultado->fetch_assoc();


            if($config['Encryped_Dados'] == true){   
                $senha_Atual = openssl_encrypt($senhaatual_email, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
            }else{
                $senha_Atual = $senhaatual_email;   
            }

            if($senha_Atual === $senha["senha"]){

                $sql = "SELECT email FROM usuarios WHERE usuario = '$user'";
                $resultado = $conn->query($sql);
                $linha = $resultado->fetch_assoc();


                if ($emailatual === $linha["email"]) {
                    $sqlUpdate = "UPDATE usuarios SET email = '$emailnovo' WHERE usuario = '$user'";
                    if ($conn->query($sqlUpdate) === true) {
                        echo "<p class='messageSuccess'>Troca bem sucedida!</p>";
                        echo "<script>
                            setTimeout(function(){
                              window.location.href = '?to=conta&seguranca';
                            }, 2000);
                          </script>";
                    } else {
                        echo "<p class='messageError'>Erro ao atualizar o email: $conn->error</p>";
                    }
                } else {
                    echo "<p class='messageError'>Email Atual Incorreto!</p>";
                }
            }else{
                echo "<p class='messageError'>Senha Atual Incorreta!</p>";
            }
        }
    }
}

?>
