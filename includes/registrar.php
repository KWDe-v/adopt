<?php 

require_once 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = $_POST['usuario_registro'];
    $email = $_POST['email_registro'];
    $senha = $_POST['senha_registro'];
    $confirmarSenha = $_POST['confirmarsenha'];
    $sexo = $_POST['genero'];
	$nascimento = $_POST['nascimento'];
	$dataAtual = new DateTime();
	$dataNascimento = new DateTime($nascimento); 
	$idade = $dataAtual->diff($dataNascimento);
	$ip = $_SERVER['REMOTE_ADDR']; 

        
    if (empty($usuario) || empty($email) || empty($senha) || empty($confirmarSenha) || empty($nascimento)) {
        echo "<p class='messageError'>Todos os campos são obrigatórios.</p>";
    } elseif (!isset($_POST['termos']) || $_POST['termos'] != 'on') {
        echo "<p class='messageError'>Você precisa concordar com os termos.</p>";
    } elseif ($senha !== $confirmarSenha) {
        echo "<p class='messageError'>As senhas não coincidem.</p>";
    } elseif (strlen($usuario) < 6 || strlen($senha) < 6) {
        echo "<p class='messageError'>O usuário e a senha devem ter no mínimo 6 caracteres!</p>";
    } elseif (!ctype_alnum($usuario) || !ctype_alnum($senha)) {
        echo "<p class='messageError'>O usuário e a senha devem conter apenas letras e números!</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='messageError'>Insira um E-mail válido!</p>";
    } else {
       
        $query_verificar_email = "SELECT * FROM usuarios WHERE email = ?";
        $stmt_verificar_email = $conn->prepare($query_verificar_email);
        $stmt_verificar_email->bind_param("s", $email);
        $stmt_verificar_email->execute();
        $result_verificar_email = $stmt_verificar_email->get_result();
        
        if ($result_verificar_email->num_rows > 0) {
            echo "<p class='messageError'>Este E-mail já está cadastrado. Tente outro!</p>";
        } else {
            $query_verificar_usuario = "SELECT * FROM usuarios WHERE usuario = ?";
            $stmt_verificar_usuario = $conn->prepare($query_verificar_usuario);
            $stmt_verificar_usuario->bind_param("s", $usuario);
            $stmt_verificar_usuario->execute();
            $result_verificar_usuario = $stmt_verificar_usuario->get_result();
            
            if ($result_verificar_usuario->num_rows > 0) {
                echo "<p class='messageError'>Este usuário já está cadastrado. Tente outro!</p>";
            } else {

                if($config['Encryped_Dados'] == true){
                    
                    $senhaUser = openssl_encrypt($senha, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
                }else{
                    $senhaUser = $senha;
                }

                                
                $sql = "INSERT INTO usuarios (usuario, email, senha, sexo, nascimento, idade, ip_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssis", $usuario, $email, $senhaUser, $sexo, $nascimento, $idade->y, $ip);

                if ($stmt->execute()) {

                	$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
                	$stmt->bind_param("s", $usuario);
			        $stmt->execute();
			        $resultado = $stmt->get_result();
			        $user = $resultado->fetch_assoc();


                	$_SESSION["usuario"] = $user["usuario"];
                    $_SESSION["grupo"] = $user["admin"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["sexo"] = $user["sexo"];
                    echo "<p class='messageSuccess'>Registrado com sucesso! Redirecionando...</p>";

                    echo "<script>
                            setTimeout(function(){
                                window.location.href = '?to=inicio';
                            }, 2000);
                          </script>";
                } else {
                    echo "<p class='messageError'>Erro ao cadastrar. Por favor, tente novamente.</p>";
                }

                $stmt->close();
            }
        }
    }
}
 ?>	