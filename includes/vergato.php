<?php 
$id_gato = intval($_GET['id']);  
$sql = "SELECT * FROM gatos WHERE id = $id_gato";
$sth = $conn->query($sql);
$gato = $sth->fetch_assoc(); 


$title = 'Pet: ' . $gato['nome'];

?>