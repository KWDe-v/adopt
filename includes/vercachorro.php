<?php 
$id_cachorro = intval($_GET['id']);  
$sql = "SELECT * FROM cachorros WHERE id = $id_cachorro";
$sth = $conn->query($sql);
$cachorro = $sth->fetch_assoc(); 


$title = 'Pet: ' . $cachorro['nome'];

?>