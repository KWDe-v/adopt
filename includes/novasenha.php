<?php

$codigo = $conn->real_escape_string($_GET["code"]);

$sql = "SELECT account_id, resetado FROM resetpass WHERE code = '$codigo'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        if ($linha["resetado"] == 0) {
            $account_id = $linha["account_id"];

            $novaSenha = "";
            $caracteres =
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $caracteres = str_split($caracteres);
            $tamanho = 10;

            for ($i = 0; $i < $tamanho; $i++) {
                $novaSenha .= $caracteres[array_rand($caracteres)];
            }

            $sql_email = "SELECT email, usuario FROM usuarios WHERE id = $account_id";
            $resultado_email = $conn->query($sql_email);

            if ($resultado_email->num_rows > 0) {
                $linha_email = $resultado_email->fetch_assoc();
                $email = $linha_email["email"];
                $userid = $linha_email["usuario"];

                if($config['Encryped_Dados'] == true){
                     $senhaUser = openssl_encrypt($novaSenha, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');
                }else{
                    $senhaUser = $novaSenha;
                }


                $sql1 = "UPDATE usuarios SET senha = '$senhaUser' WHERE id = $account_id";
                $sql2 = "UPDATE resetpass SET resetado = 1, new_password = '$senhaUser' WHERE account_id = $account_id AND code = '$codigo'";

                if (
                    $conn->query($sql1) === true &&
                    $conn->query($sql2) === true
                ) {
                    $para = $email;
                    $assunto = "Redefinição de Senha";
                    $mensagem = '
                                <!DOCTYPE html>
                                <html lang="pt-BR">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Nova Senha Gerada</title>
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
                                        }
                                    </style>
                                </head>
                                <body>
                                    <div class="container">
                                        <h2><img src="'.$config['BaseURL'].'/img/logomail.png" width="250"></h2>
                                        <p>Olá '.$userid.',</p>
                                        <p>Ficamos felizes em informar que sua senha foi redefinida com sucesso. Abaixo estão os detalhes da sua conta:</p>
                                        <ul>
                                            <li><strong>Nome de Usuário:</strong> '.$userid.'</li>
                                            <li><strong>Nova Senha:</strong> '.$novaSenha.'</li>
                                        </ul>
                                        <p>Por favor, lembre-se de guardar esta informação em um local seguro. Caso tenha alguma dúvida ou precise de mais assistência, não hesite em entrar em contato conosco.</p>
                                        <p class="footer">Atenciosamente, '.$config["NameSite"].'</p>
                                    </div>
                                </body>
                                </html>';

                    $cabecalhos = "MIME-Version: 1.0\r\n";
                    $cabecalhos .=
                        "Content-type: text/html; charset=iso-8859-1\r\n";
                    $cabecalhos .= "From: " . $config["EmailAdmin"] . "\r\n";
                    $cabecalhos .=
                        "Reply-To: " . $config["EmailAdmin"] . "\r\n";
                    $cabecalhos .= "X-Mailer: PHP/" . phpversion();

                    if (mail($para, $assunto, $mensagem, $cabecalhos)) {
                        $message = "<p class='messageSuccess'>Uma nova senha foi enviado ao seu email!</p>
                        <script>
                            setTimeout(function(){
                                window.location.href = '?to=logout';
                            }, 5000);
                        </script>";
                    } else {
                        $message = "<p class='messageError'>Falha ao enviar o e-mail!</p>";
                    }
                } else {
                    $message = "<p class='messageError'>Erro ao atualizar as tabelas: " . $conn->error . "</p>";
                }
            } else {
                $message = "<p class='messageError'>O email fornecido não corresponde ao usuário!</p><script>
                            setTimeout(function(){
                                window.location.href = '?to=logout';
                            }, 5000);
                        </script>";
            }
        } else {
            $message = "<p class='messageError'>O link já foi utilizado.</p>                        
                            <script>
                            setTimeout(function(){
                                window.location.href = '?to=logout';
                            }, 5000);
                        </script>";
        }
    }
} else {
    $message = "<p class='messageError'>Link inválido.</p><script>
                            setTimeout(function(){
                                window.location.href = '?to=logout';
                            }, 5000);
                        </script>";
}


?>
