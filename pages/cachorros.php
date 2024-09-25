         <section class="banner-area relative" id="home" style="  background: url(img/banner-bg<?php echo  $_SESSION['image_bg'] ?>.png) center;background-size: cover;">
            <div class="container">
               <div class="overlay overlay-bg"></div>
               <div class="row d-flex align-items-center justify-content-center">
                  <div class="banner-content col-lg-12 col-md-12">
<div class="db-container" style="margin: 10% 0;">
   
      <h1 align="center"><img src="img/icones/cachorro.png" style="transform: scaleX(-1); width: 50px;"/> <?php echo $title?> <img src="img/icones/cachorro.png" style="width: 50px;"/></h1>
      <div class="search-box">
         <form id="buscarCachorros" method="get" action="">
            <input name="to" type="hidden" value="cachorros" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Nome ou Raça" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <button type="submit" class="fas fa-search btn-filter" style="width:55px; height: 45px;"></button>
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="btn-filter">Filtrar</button></a>
      <?php if(!isset($_GET['busca']) && !isset($_GET['filter'])):?>
      <button class="btn-filter" style="pointer-events: none; opacity: 0.6;">Limpar</button><br><br>
      <?php else:?>
      <a href="?to=cachorros&page=1"><button class="btn-filter">Limpar</button></a><br><br>
      <?php endif?>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="cachorros" />
            <input name="page" type="hidden" value="1" />
            <?php foreach ($tamanhos as $key => $tamanho): ?>

            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $tamanho == $_GET['filter']): ?>
               <input id="tipo<?php echo $tamanho; ?>" type="radio" name="filter" value="<?php echo$tamanho; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $tamanho ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $tamanho; ?>" type="radio" name="filter" value="<?php echo$tamanho; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $tamanho; ?>" style="color:white;"><img src="img/icones/<?php echo ($tamanho == 'Médio') ? 'medio' :strtolower($tamanho); ?>.png" /> <?php echo $tamanho; ?></label>
            </div>

            <?php endforeach; ?>

         </div>
      </form>
      <?php if($cachorros):?>
<table class="lista-pets">
    <?php
    $count = 0; 

    foreach ($paginated_dogs as $cachorro):
        if ($count % 3 == 0): 
            if ($count > 0) echo '</tr>'; 
            echo '<tr>';
        endif;
    ?>
        <td>
            <img src="<?php echo $cachorro['imagem'] ?>" alt="Cachorro"><br><br>
            <p>Nome: <?php echo $cachorro['nome'] ?></p>
            <p>Raça: <?php echo $cachorro['raca'] ?></p>
            <p>Tamanho: <?php echo $cachorro['tamanho'] ?></p>
            <p>Peso: <?php echo $cachorro['peso'] ?></p>
            <p>Idade: <?php echo $cachorro['idade'] ?> Anos</p>
            <p>Doença: <?php echo ($cachorro['doenca'] == 1) ?'Sim' : 'Não' ?> </p>
            <div>
               <a href="?to=vercachorro&id=<?php echo $cachorro['id'] ?>" class="primary-btn">Ver</a>
        </td>
    <?php
        $count++;
    endforeach;
    if ($count % 3 != 0) echo '</tr>';
    ?>
</table>
      <div class="footer-table">
         <a class="btn-footer-anterior <?php if ($page <= 1) echo 'disable'; ?>" href="<?php echo $prev_page_url; ?>" align="center">Anterior</a>
         <span id="paginas"><?php echo $page . ' de ' . $total_pages; ?></span>
         <a class="btn-footer-proximo <?php if ($page == $total_pages) echo 'disable'; ?>" href="<?php echo $next_page_url; ?>" align="center">Próximo</a>
      </div>
      <div class="footer-table">
         <form id="page-form" onsubmit="goToPage(event)">
            <label for="page-number" style="color:white;">Ir Para:</label>
            <input type="number" id="page-number" name="page" style="width: 75px;" min="1"max="<?php echo $total_pages; ?>">
            <button class="btn-filter" type="submit" style="width: 50px;">Ir</button>
         </form>
      </div>
      <?php else:?>
         <div class="pet-not-found">
            <h2>Nenhum resultado encontrado </h2>
            <img src="img/cachorros/notfound.png">
             <?php if(isset($_GET['busca']) || isset($_GET['filter'])):?>
            <p><a href="?to=cachorros" class="primary-btn"> Voltar a Pagina Anterior.</a></p>
             <?php else:?>
            <p><a href="?to=inicio" class="primary-btn"> Voltar a Pagina Anterior.</a></p>
             <?php endif?>
         </div>
      <?php endif?>
   </div>
                  </div>                                 
               </div>
            </div></div>
         </section>



