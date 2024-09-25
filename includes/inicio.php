<?php 

$title = 'Encontre o Amor em 4 Patas';

try {
    $sql = "SELECT 'total_cachorros' AS tipo, COUNT(*) AS total FROM cachorros WHERE adotado = 1
            UNION ALL
            SELECT 'total_gatos' AS tipo, COUNT(*) AS total FROM gatos WHERE adotado = 1";

    $sth = $conn->query($sql);
    $result = $sth->fetch_all(MYSQLI_ASSOC);


    $total_cachorros_adotados = 0;
    $total_gatos_adotados = 0;

    foreach ($result as $row) {
        if ($row['tipo'] === 'total_cachorros') {
            $total_cachorros_adotados = $row['total'];
        } elseif ($row['tipo'] === 'total_gatos') {
            $total_gatos_adotados = $row['total'];
        }
    }

    
    
    $sql = "SELECT 'total_cachorros' AS tipo, COUNT(*) AS total FROM cachorros WHERE adotado = 0
            UNION ALL
            SELECT 'total_gatos' AS tipo, COUNT(*) AS total FROM gatos WHERE adotado = 0";

    $sth = $conn->query($sql);
    $result = $sth->fetch_all(MYSQLI_ASSOC);


    $total_cachorros_adotados = 0;
    $total_gatos = 0;

    foreach ($result as $row) {
        if ($row['tipo'] === 'total_cachorros') {
            $total_cachorros_adotados = $row['total'];
        } elseif ($row['tipo'] === 'total_gatos') {
            $total_gatos = $row['total'];
        }
    }

    
    $total_pets = $total_gatos + $total_cachorros_adotados;
    $pets_adotados = $total_gatos_adotados + $total_cachorros_adotados;

} catch (Exception $e) {
    
    define("__ERROR__", true);
    include "fatalerror.php";
    exit();
}

 ?>	