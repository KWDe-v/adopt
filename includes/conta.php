<?php 

if(!isset($_SESSION['usuario'])){
   header('Location: ?to=error&id=401');
   exit;
}
 

$title = "Minha Conta";


$usuario_session = $_SESSION['usuario'];
try {

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario_session' LIMIT 1";

    $sth = $conn->query($sql);
    $usuario = $sth->fetch_all(MYSQLI_ASSOC); 


} catch (Exception $e) {
    define("__ERROR__", true);
    include "fatalerror.php";
    exit();
}
    $usuario_data = $usuario[0]; 
    extract($usuario_data);
    $account_id = $usuario_data['id'];

    try {

        $sql = "SELECT * FROM estado ORDER BY nome ASC";

        $sth = $conn->query($sql);
        $estados = $sth->fetch_all(MYSQLI_ASSOC); 


    } catch (Exception $e) {
        define("__ERROR__", true);
        include "fatalerror.php";
        exit();
    }





if(isset($_GET['meus_pets'])){



   if(isset($_GET['ativar'])){

        $pagina = (int)$_GET["page"];
        $id = (int)$_GET["id"];
        $tipo = $_GET['tipo'];

        if (empty($id) || !isset($id)) {
            header("Location: ?to=error&id=401");
            exit();
        }
        $sql = "UPDATE `$tipo` SET adotado = 0 WHERE id = $id";

        if($conn->query($sql)){
            ADOPT::defineMessageSession("<p class='messageSuccess'>Pet Ativo com Sucesso</p>");
        }else{
            ADOPT::defineMessageSession("<p class='messageError'>Houve um Erro ao ativar o pet!</p>");
        }
            header('Location: ?to=conta&meus_pets&page='.$pagina);
            exit;

   }elseif(isset($_GET['desativar'])){
        $pagina = (int)$_GET["page"];
        $id = (int)$_GET["id"];
        $tipo = $_GET['tipo'];

        if (empty($id) || !isset($id)) {
            header("Location: ?to=error&id=401");
            exit();
        }
        $sql = "UPDATE `$tipo` SET adotado = 1 WHERE id = $id";

        if($conn->query($sql)){
            ADOPT::defineMessageSession("<p class='messageSuccess'>Pet desativado com Sucesso</p>");
        }else{
            ADOPT::defineMessageSession("<p class='messageError'>Houve um Erro ao desativar o pet!</p>");
        }
            header('Location: ?to=conta&meus_pets&page='.$pagina);
            exit;

   }elseif(isset($_GET['cadastrar_pet'])){


         if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $types = array('gif', 'jpeg', 'jpg', 'png');



            $nome = $_POST["nome"];
            $raca = $_POST["raca"];
            $doenca = $_POST["doenca"];
            $peso = $_POST["peso"];
            $idade = $_POST["idade"];
            $tipo = $_POST["tipo"];
            $tamanho = $_POST["tamanho"];
           
            $foto_perfil = $_FILES['foto'];
            $target_dir = "img/$tipo/";
            $file_type = strtolower(pathinfo($foto_perfil["name"], PATHINFO_EXTENSION));


            if (empty($nome) || empty($raca) || empty($peso) || !isset($doenca) || !isset($idade)) {
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha todos os campos!</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else if(!is_numeric($peso)){
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha o um peso válido!</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else if(!is_numeric($idade)){
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha o uma idade válida!</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else if($doenca != 0 && $doenca != 1){
                ADOPT::defineMessageSession("<p class='messageError'>Selecione se o pet tem doença ou não!</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else if (!in_array($file_type, $types) && !empty($foto_perfil["name"]) && $foto_perfil["name"] > 0) {
                ADOPT::defineMessageSession("<p class='messageError'>Somente arquivos GIF, JPEG, JPG e PNG são permitidos.</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else if(empty($foto_perfil["name"]) || $foto_perfil["name"] < 0){
                ADOPT::defineMessageSession("<p class='messageError'>Adicione uma foto do seu Pet.</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }else{

                $file_name = uniqid($usuario_session."_", false) . rand() . "." . $file_type;
                $target_file = $target_dir . $file_name;


                
                $envio = move_uploaded_file($foto_perfil["tmp_name"], $target_file);
                if (!$envio) {
                       ADOPT::defineMessageSession("<p class='messageError'>Desculpe, ocorreu um erro ao enviar o seu arquivo.</p>");
                }else{
                    $sql = "INSERT INTO `$tipo` (nome, raca, doenca, peso, idade, imagem, tamanho, dono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssiiissi", $nome, $raca, $doenca, $peso, $idade, $target_file, $tamanho, $account_id);
                }
            


            if ($stmt->execute()) {
                ADOPT::defineMessageSession("<p class='messageSuccess'>Pet cadastrado com Sucesso</p>");
                header('Location: ?to=conta&meus_pets');
                exit;

            } else {
                           
                //echo "Erro ao atualizar os dados: " . $stmt->error;
                ADOPT::defineMessageSession("<p class='messageError'>Houve um Erro ao cadastrar seu Pet!</p>");
                header('Location: ?to=conta&meus_pets&cadastrar_pet');
                exit;
            }

        }
    }

   }elseif(isset($_GET['editar'])){

        $id = (int)$_GET["id"];
        $tipo = $_GET['tipo'];

        if (empty($id) || !isset($id)) {
            header("Location: ?to=error&id=401");
            exit();
        }
        $sql = "SELECT * FROM `$tipo` WHERE id = $id AND dono = $account_id";
        $result = $conn->query($sql);
        $pet = $result->fetch_assoc();

         if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $types = array('gif', 'jpeg', 'jpg', 'png');



            $nome = $_POST["nome"];
            $raca = $_POST["raca"];
            $doenca = $_POST["doenca"];
            $peso = $_POST["peso"];
            $idade = $_POST["idade"];
           
            $foto_perfil = $_FILES['foto'];
            $target_dir = "img/$tipo/";
            $file_type = strtolower(pathinfo($foto_perfil["name"], PATHINFO_EXTENSION));


            if (empty($nome) || empty($raca) || empty($peso) || !isset($doenca) || !isset($idade)) {
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha todos os campos!</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }else if(!is_numeric($peso)){
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha o um peso válido!</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }else if(!is_numeric($idade)){
                ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha o uma idade válida!</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }else if($doenca != 0 && $doenca != 1){
                ADOPT::defineMessageSession("<p class='messageError'>Selecione se o pet tem doença ou não!</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }else if (!in_array($file_type, $types) && !empty($foto_perfil["name"]) && $foto_perfil["name"] > 0) {
                ADOPT::defineMessageSession("<p class='messageError'>Somente arquivos GIF, JPEG, JPG e PNG são permitidos.</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }else{

                $file_name = uniqid($usuario_session."_", false) . rand() . "." . $file_type;
                $target_file = $target_dir . $file_name;


                if(!empty($foto_perfil["name"]) && $foto_perfil["name"] > 0){
                    $envio = move_uploaded_file($foto_perfil["tmp_name"], $target_file);
                    if (!$envio) {
                       ADOPT::defineMessageSession("<p class='messageError'>Desculpe, ocorreu um erro ao enviar o seu arquivo.</p>");
                   }else{
                    $sql = "UPDATE `$tipo` SET nome = ?, raca = ?, doenca = ?, peso = ?, idade = ?, imagem = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssiiiss", $nome, $raca, $doenca, $peso, $idade, $target_file, $id);
                }
            }else{
                $sql = "UPDATE `$tipo` SET nome = ?, raca = ?, doenca = ?, peso = ?, idade = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiiis", $nome, $raca, $doenca, $peso, $idade, $id);
            }


            if ($stmt->execute()) {
                ADOPT::defineMessageSession("<p class='messageSuccess'>Dados Atualizados com Sucesso</p>");
                header('Location: ?to=conta&meus_pets');
                exit;

            } else {
                    
                 //echo "Erro ao atualizar os dados: " . $stmt->error;
                ADOPT::defineMessageSession("<p class='messageError'>Houve um Erro ao atualizar seus dados!</p>");
                header('Location: ?to=conta&meus_pets&editar&tipo='.$tipo.'&id='.$id);
                exit;
            }

        }
    }

   }else{
       $pagina = (int)$_GET["page"];

        if (empty($pagina) || !isset($pagina)) {
            header("Location: ?to=conta&meus_pets&page=1");
            exit();
        }
            if (isset($_GET["busca"]) || !empty($_GET["busca"])) {
                $busca = $_GET["busca"];
                try {
                    $sql = "SELECT *, 'gatos' AS tipo FROM gatos WHERE nome LIKE '%$busca%' OR raca LIKE '%$busca%' AND dono = $account_id";
                    $sql .= " UNION ALL ";
                    $sql .= "SELECT *, 'cachorros' AS tipo FROM cachorros WHERE nome LIKE '%$busca%' OR raca LIKE '%$busca%' AND dono = $account_id";
                    $sql .= " ORDER BY data_cadastro DESC";

                    $sth = $conn->query($sql);
                    $pets = $sth->fetch_all(MYSQLI_ASSOC); 

                } catch (Exception $e) {
                    define("__ERROR__", true);
                    include "fatalerror.php";
                    exit();
                }
            } else {
                
                $sql = "SELECT *, 'gatos' AS tipo FROM gatos WHERE dono = $account_id";
                $sql .= " UNION ALL ";
                $sql .= "SELECT *, 'cachorros' AS tipo FROM cachorros WHERE dono = $account_id";
                $sql .= " ORDER BY data_cadastro DESC";
                try {
                    $sth = $conn->query($sql);
                    $pets = $sth->fetch_all(MYSQLI_ASSOC);
                } catch (Exception $e) {
                    define('__ERROR__', true);
                    include('fatalerror.php');
                    exit;
                }
            }


        $pets_por_pagina = 6;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_gatos = count($pets);
        $total_pages = ceil($total_gatos / $pets_por_pagina);
        $start_index = ($page - 1) * $pets_por_pagina;
        $end_index = min(
            $start_index + $pets_por_pagina - 1,
            $total_gatos - 1
        );
        $paginated_pets = array_slice(
            $pets,
            $start_index,
            $pets_por_pagina
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


        if (($pagina > $total_pages) && !empty($pets)) {
            header("Location: ?to=error&id=404");
            exit();
        }
    }
}else{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $types = array('gif', 'jpeg', 'jpg', 'png');
        $nome_completo = $_POST["nome_completo"];

        $cpf = $_POST["cpf"];


        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $estado = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $estado_civil = $_POST["estado_civil"];
        $foto_perfil = $_FILES['foto_perfil'];
        $target_dir = "img/usuarios/";
        $file_type = strtolower(pathinfo($foto_perfil["name"], PATHINFO_EXTENSION));


        if (empty($nome_completo) || empty($cpf) || empty($email) || empty($telefone) || empty($cidade) || !isset($estado) || !isset($estado_civil)) {
            ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha todos os campos!</p>");
            header('Location: ?to=conta');
            exit;
        }else if(!validarCPF($cpf)){
            ADOPT::defineMessageSession("<p class='messageError'>Digite um CPF válido!</p>");
            header('Location: ?to=conta');
            exit;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            ADOPT::defineMessageSession("<p class='messageError'>Digite um Email válido!</p>");
            header('Location: ?to=conta');
            exit;
        }else if(!preg_match("/^[0-9]{1,}$/",$telefone)){
            ADOPT::defineMessageSession("<p class='messageError'>Por favor, preencha o um telefone válido!</p>");
            header('Location: ?to=conta');
            exit;
        }else if (!in_array($file_type, $types) && !empty($foto_perfil["name"]) && $foto_perfil["name"] > 0) {
            ADOPT::defineMessageSession("<p class='messageError'>Somente arquivos GIF, JPEG, JPG e PNG são permitidos.</p>");
            header('Location: ?to=conta');
            exit;
        }else{

            $encrypted_cpf = openssl_encrypt($cpf, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678');


            $query_verificar_cpf = "SELECT cpf FROM usuarios WHERE cpf = ? AND usuario != ?";
            $stmt_verificar_cpf = $conn->prepare($query_verificar_cpf);
            $stmt_verificar_cpf->bind_param("ss", $encrypted_cpf, $usuario_session);
            $stmt_verificar_cpf->execute();
            $result_verificar_cpf = $stmt_verificar_cpf->get_result();

            if ($result_verificar_cpf->num_rows > 0) {
                ADOPT::defineMessageSession("<p class='messageError'>CPF Já cadastrado!.</p>");
                header('Location: ?to=conta');
                exit;
            } 

            $file_name = uniqid($usuario_session."_", false) . rand() . "." . $file_type;
            $target_file = $target_dir . $file_name;


            if(!empty($foto_perfil["name"]) && $foto_perfil["name"] > 0){
                $envio = move_uploaded_file($foto_perfil["tmp_name"], $target_file);
                if (!$envio) {
                 ADOPT::defineMessageSession("<p class='messageError'>Desculpe, ocorreu um erro ao enviar o seu arquivo.</p>");
             }else{
                $sql = "UPDATE usuarios SET nome_completo = ?, CPF = ?, email = ?, telefone = ?, estado = ?, cidade = ?, estado_civil = ?, foto_perfil = ? WHERE usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssssss", $nome_completo, $encrypted_cpf, $email, $telefone, $estado, $cidade, $estado_civil, $file_name, $usuario_session);
            }
        }else{
            $sql = "UPDATE usuarios SET nome_completo = ?, CPF = ?, email = ?, telefone = ?, estado = ?, cidade = ?, estado_civil = ? WHERE usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $nome_completo, $encrypted_cpf, $email, $telefone, $estado, $cidade, $estado_civil, $usuario_session);
        }


        if ($stmt->execute()) {
            ADOPT::defineMessageSession("<p class='messageSuccess'>Dados Atualizados com Sucesso</p>");
            header('Location: ?to=conta');
            exit;

        } else {
                       
            //echo "Erro ao atualizar os dados: " . $stmt->error;
            ADOPT::defineMessageSession("<p class='messageError'>Houve um Erro ao atualizar seus dados!</p>");
            header('Location: ?to=conta');
            exit;
        }

    }
}
}
?>   