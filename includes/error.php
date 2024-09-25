<?php


if(isset($_GET['id']) && $_GET['id'] == '401'){
    header("HTTP/1.0 401 Not Authorized");
    $title = 'Não Autorizado';
}else{
    header("HTTP/1.0 404 Not Found");
    $title = 'Página Não Encontrada';
}


?>