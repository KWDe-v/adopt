

	<!DOCTYPE html>
	<html lang="pt-br" >
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="KWDe-v">
		<!-- Meta Description -->
		<meta name="description" content="Encontre o Amor em 4 Patas">
		<!-- Meta Keyword -->
		<meta name="keywords" content="<?php echo $config['NameSite'] ?>, adotar, pet, pets, cachorro, gato, adoção, arrecadar">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?php echo $config['NameSite'] ?> - <?php echo $title ?></title>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--=================== CSS ========================== -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			  <header id="header" id="home">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="?to=inicio"><img src="img/logo.png" alt="" title="" width="250" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="?to=inicio">Inicio</a></li>
				          <li><a href="javascript:void(0);">Sobre Nós</a></li>
				          <li><a href="?to=gatos">Gatos</a></li>
				          <li><a href="?to=cachorros">Cachorros</a></li>				          
				          <li><a href="javascript:void(0);">Contato</a></li>
				          <?php if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])): ?>
				          <li class="menu-has-children"><a href="javascript:void(0);"><?php echo $_SESSION['usuario']; ?></a>
				            <ul>
				              <li><a href="?to=conta">Minha Conta</a></li>
				              <li><a href="?to=conta&meus_pets&cadastrar_pet">Cadastrar Pet</a></li>
				               <li><a href="?to=logout">Sair</a></li>
				             <?php else: ?>
				          <li class="menu-has-children"><a href="javascript:void(0);">Conta</a>
				            <ul>
				              <li><a href="javascript:void(0);" onclick="mostrarFormularioLogin()">Entrar</a></li>
				               <li><a href="javascript:void(0);"onclick="mostrarFormularioRegistro()">Registrar</a></li>
								<?php endif ?>
				            </ul>
				          </li>				              
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			  <?php  include('pages/entrar.php') ?>
			  <?php  include('pages/registrar.php') ?>