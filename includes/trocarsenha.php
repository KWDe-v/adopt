<?php
require_once "config.php";

$user = $_SESSION["usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senhaAtual = $_POST["senhaatual"];
    $novaSenha = $_POST["senhanova"];
    $confirmarSenha = $_POST["confsenhanova"];

    if (empty($senhaAtual) || empty($novaSenha) || empty($confirmarSenha)) {
        echo "<p class='messageError'>Por favor, preencha todos os campos.</p>";
    } elseif ($novaSenha != $confirmarSenha) {
        echo "<p class='messageError'>Nova senha e confirmação não correspondem!</p>";
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $novaSenha)) {
        echo "<p class='messageError'>A nova senha deve conter apenas números e letras.</p>";
    } elseif (strlen($novaSenha) < 6) {
        echo "<p class='messageError'>A nova senha deve ter no mínimo 6 caracteres!</p>";
    } else {
        $sql = "SELECT senha FROM usuarios WHERE usuario = '$user'";
        $resultado = $conn->query($sql);
        $linha = $resultado->fetch_assoc();

        if($config['Encryped_Dados'] == true){
            $senha_Atual = openssl_encrypt($senhaAtual, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
            $nova_Senha = openssl_encrypt($novaSenha, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
        }else{
            $senha_Atual = $senhaAtual;
            $nova_Senha = $novaSenha;
        }


        if ($senha_Atual === $linha["senha"]) {
            $sql = "UPDATE usuarios SET senha = '$nova_Senha' WHERE usuario = '$user'";

            if ($conn->query($sql) === true) {
                echo "<p class='messageSuccess'>Troca bem sucedida! Relogue...</p>";

                echo "<script>
                       setTimeout(function(){
                        window.location.href = '?to=logout';
                        }, 2000);
                      </script>";
            } else {
                echo "<p class='messageError'>Erro ao atualizar a senha: $conn->error</p>";
            }
        } else {
            echo "<p class='messageError'>Senha atual incorreta!</p>";
        }
    }
}

?>
