<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['usuario']) || empty($_POST['email'])) {
        echo "<p class='messageError'>Por favor, preencha todos os campos.</p>";
    } else {
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $email = $conn->real_escape_string($_POST['email']);

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND email = '$email'";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $codigo = md5(rand() + 500); 
                $account_id = $linha["id"];
                $senhaAntiga = $linha["senha"];


                $sql = "INSERT INTO resetpass (code, account_id, old_password, new_password, request_date) ";
                $sql .= "VALUES ('$codigo', $account_id, '$senhaAntiga', NULL, NOW())";
                
                if ($conn->query($sql) === TRUE) {
                    $para = $linha["email"];
                    $assunto = "Redefinição de Senha";
                    $reset_link = "https://{$config['BaseURL']}/?to=novasenha&code=$codigo&account_id=$account_id"; 
                    $mensagem = '                       <html lang="pt-BR">
                       <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Solicitação de Nova Senha</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                line-height: 1.6;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                                color: #333;
                            }
                            .container {
                                width: 80%;
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 5px;
                                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                            }
                            h2 {
                                color: #007bff;
                            }
                            p {
                                margin-bottom: 20px;
                            }  .viewticket {
                                display: inline-block; 
                                padding: 16px 36px; 
                                font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; 
                                font-size: 16px; color: #ffffff; 
                                color: white;
                                background: #1a82e2;
                                text-decoration: none; 
                                border-radius: 6px;
                                opacity: 0.75;
                                transition: all 0.3s ease;
                            }
                            .viewticket:hover {
                               transition: all 0.3s ease;
                               opacity: 1;
                               
                           }
                       </style>
                   </head>
                   <body>
                    <div class="container">
                        <h2><img src="'.$config['BaseURL'].'/img/logomail.png" width="250"></h2>
                        <p>Olá ' . htmlspecialchars($usuario) . ', Você recebeu este e-mail porque você ou outra pessoa preencheu nosso formulário de "redefinição de senha", solicitando a redefinição da senha da sua conta em nosso servidor.</p>
                        
                        <a href="' . $reset_link . '" target="_blank" ><div class="viewticket">Redefinir Senha</div></a>
                        
                        <p style="margin: 0;">Se isso não funcionar, copie e cole o seguinte link no seu navegador:</p>
                        <p style="margin: 0;"><a href="' . $reset_link . '" target="_blank">' . $reset_link . '</a></p>
                        <p class="footer">Atenciosamente, '.$config["NameSite"].'</p>
                    </div>
                </body>
                </html>';

                    $cabecalhos  = "MIME-Version: 1.0\r\n";
                    $cabecalhos .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $cabecalhos .= "From:". $config['EmailAdmin']."\r\n";
                    $cabecalhos .= "Reply-To:". $config['EmailAdmin']."\r\n";
                    $cabecalhos .= "X-Mailer: PHP/" . phpversion();

                    if(mail($para, $assunto, $mensagem, $cabecalhos)) {
                        echo "<p class='messageSuccess'>Um email de recuperação foi enviado para sua caixa de entrada</p>";
                    } else {
                        echo "<p class='messageError'>Falha ao enviar o e-mail.</p>";
                    }
                } else {
                    echo "<p class='messageError'>Erro na inserção: " . $conn->error . "</p>";
                }
            } else {
                echo "<p class='messageError'>O email fornecido não corresponde ao usuário.</p>";
            }
        } else {
            echo "<p class='messageError'>O usuário fornecido não foi encontrado.</p>";
        }
    }
}
?>
