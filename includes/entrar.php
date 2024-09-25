<?php 
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario_login"];
    $senha = $_POST["senha_login"];

    if (empty($usuario) || empty($senha)) {
        echo "<p class='messageError'>Por favor, preencha todos os campos!</p>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        if ($stmt === false) {
            echo "Erro ao preparar a consulta: " . $conn->error;
            exit();
        }

        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows == 1) {
            $user = $resultado->fetch_assoc();
            if($config['Encryped_Dados'] == true){
                $senhaUser = openssl_encrypt($senha, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
            }else{
                $senhaUser = $senha;
            }
            if ($senhaUser == $user["senha"]) {
                $_SESSION["usuario"] = $user["usuario"];
                $_SESSION["grupo"] = $user["admin"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["sexo"] = $user["sexo"];

                $_SESSION["telefone"] = $user["telefone"];


                if (isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); 
                    echo "<p class='messageSuccess'>Login bem sucedido! Redirecionando...</p>";
                    echo "<script>
                    setTimeout(function(){
                        window.location.href = '$redirect_url';
                        }, 2000);
                        </script>";
                } else {
                    echo "<p class='messageSuccess'>Login bem sucedido! Redirecionando...</p>";

                    echo "<script>
                    setTimeout(function(){
                        window.location.href = '?to=inicio';
                        }, 2000);
                        </script>";
                }
                exit();

            } else {
                echo "<p class='messageError'>Senha incorreta.</p>";
            }
        } else {
            echo "<p class='messageError'>Usuário não encontrado.</p>";
        }

        $stmt->close();
    }
}





 ?>	