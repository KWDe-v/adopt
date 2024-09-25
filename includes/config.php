<?php 
include('functions.php');
session_start();
date_default_timezone_set('America/Sao_Paulo');
$config = [
    'NameSite'                      => 'Adopt',                                      // Nome do site
    'accesstoken'                   => 'SUA_KEY',                                    // key da api do MercadoPago, (necessario para funcionar a doação)
    //'accesstoken'                 => 'SUA_KEY',                                    // key de teste da api do MercadoPago
    'url_notification_api'          => 'https://BASE_URL/mp/api/notification.php',   //UR de retorno de pagamento da api
    'url_success'                   => 'https://BASE_URL/success',                   //URL_PAGAMENTO_APROVADO
    'url_pending'                   => 'https://BASE_URL/pending',                   //URL_PAGAMENTO_PENDENTE
    'url_failure'                   => 'https://BASE_URL/failure',                   //URL_PAGAMENTO_RECUSADO
    'LinkInstagram'                 => 'https://www.instagram.com/adopt',            // Link do Instagram
    'LinkFacebook'                  => 'https://www.facebook.com/adopt',             // Link do Facebook
    'WhatsappNumber'                => '00000000000',                                // Numero de whatsapp (Parametro = ddd9numero)
    'EmailAdmin'                    => 'admin@adopt.com.br',                         // Email de ADMIN
    'BaseURL'                       => 'teal-partridge-519019.hostingersite.com',    // Sua URL base exemplo www.exemple.com.br sem https ou http
    'Encryped_Dados'                => true,                                         // Encripografar os Dados importantes no banco de dados
    'Encrypted_Key_Dados'     => 'SUA_KEY',

];

$conn = ADOPT::getInstance();

if (!isset($_SESSION['image_bg']) || $_SESSION['image_bg'] == 0) {
    $_SESSION['image_bg'] = true;
} else {
    $_SESSION['image_bg'] = false;
}



 ?>	