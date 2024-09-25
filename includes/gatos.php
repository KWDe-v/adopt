<?php 
$pagina = (int)$_GET["page"];

    $title = "Gatos";
              

            $tamanhos = ['Pequeno', 'Médio', 'Grande']; 
 

    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=gatos&page=1");
        exit();
    }

    if (isset($_GET["busca"]) || !empty($_GET["busca"])) {
        $busca = $_GET["busca"];
        try {
            
            $sql = "SELECT * FROM gatos WHERE adotado = 0 AND nome LIKE '%$busca%' OR raca LIKE '%$busca%'";
            $sql .= "ORDER BY id";

            $sth = $conn->query($sql);
            $gatos = $sth->fetch_all(MYSQLI_ASSOC); 


        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } elseif (isset($_GET["filter"]) || !empty($_GET["filter"])) {
        
        $filter = $_GET["filter"];

        try {
            
            $sql = "SELECT * FROM gatos WHERE adotado = 0 AND tamanho LIKE '%$filter%'";
            $sql .= "ORDER BY id";

            $sth = $conn->query($sql);
            $gatos = $sth->fetch_all(MYSQLI_ASSOC); 


        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
  
        
    } else {
        
        $sql = "SELECT * FROM gatos WHERE adotado = 0 ORDER BY data_cadastro DESC";
        try {
            $sth = $conn->query($sql);
            $gatos = $sth->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define('__ERROR__', true);
            include('fatalerror.php');
            exit;
        }


    }

    $gatos_por_pagina = 6;
    $page = isset($pagina) ? (int) $pagina : 1;
    $total_gatos = count($gatos);
    $total_pages = ceil($total_gatos / $gatos_por_pagina);
    $start_index = ($page - 1) * $gatos_por_pagina;
    $end_index = min(
        $start_index + $gatos_por_pagina - 1,
        $total_gatos - 1
    );
    $paginated_cats = array_slice(
        $gatos,
        $start_index,
        $gatos_por_pagina
    );
    $current_url = $_SERVER["REQUEST_URI"];
    $query_params = $_GET;
    $query_params["page"] = $page + 1;
    $updated_query_string_next = http_build_query($query_params);
    $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
    $query_params["page"] = $page - 1;
    $updated_query_string_prev = http_build_query($query_params);
    $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;


    if (($pagina > $total_pages) && !empty($gatos)) {
        header("Location: ?to=error&id=404");
        exit();
    }

 ?>	