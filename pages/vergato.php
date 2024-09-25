<section class="banner-area relative" id="home" style="  background: url(img/banner-bg<?php echo  $_SESSION['image_bg'] ?>.png) center;background-size: cover;">
   <div class="container">
      <div class="overlay overlay-bg"></div>
      <div class="row d-flex align-items-center justify-content-center">
         <div class="banner-content col-lg-12 col-md-12">
            <div class="db-container" style="margin: 10% 0;">
<style type="text/css">
   .verpet {
    width: 50%;
    
    border-collapse: collapse;
    background-color: #444; 
    color: white; 

}

.verpet td img {
  vertical-align: middle;

}

.verpet th, .verpet td {

    padding: 8px;

}

.verpet th {
    background-color: #111111; 
}

.verpet tr:nth-child(even) {
    background-color: #333; 
}



.verpet img {
    max-width: 50px; 
    max-height: 50px; 
}

.info-pet{
   display: flex;

}
.info-pet .dono{
   margin-left: 5%;
   width: auto;

}

.info-pet .info-dono{
 
   width: 100%;
   color: white;
}
.info-pet .info-dono h1{
 
   font-size: 30px;
}
.info-pet .info-dono span{
 
   color: var(--CorTema);
}

.info-pet .foto-perfil{
   padding: 20px 0;
   align-items: center;
   text-align: center;

}

.info-pet .foto-perfil img{
   border-radius: 50%;

}

</style>
               <h1 align="center"><img src="img/icones/gato.png" style="transform: scaleX(-1); width: 50px;"/> <?php echo $title?> <img src="img/icones/gato.png" style="width: 50px;"/></h1><hr>
               <div class="row" style="border: 1px solid var(--CorTema); padding: 20px 10px; border-radius: 10px;">

                  <div class="col-md-3">
                     <img src="<?php echo $gato['imagem']?>" alt="" class="img-fluid" style="width: 300px; height:300px;">
                  </div>
                  <div class="col-md-9 mt-sm-20">
                     <div class="info-pet">
                   
                        <table class="verpet">
                            <tr align="left">
                                <th>Tamanho</th>
                                <td colspan="3"><?php echo $gato['tamanho']?></td>
                            </tr>
                            <tr align="left">
                                <th>Raça</th>
                                <td colspan="3"><?php echo $gato['raca']?></td>
                            </tr>
                            <tr align="left">
                                <th>Peso</th>
                                <td colspan="3"><?php echo $gato['peso']?> Kg</td>
                            </tr>
                            <tr align="left">
                                <th>Idade</th>
                                <td colspan="3"><?php echo $gato['idade']?></td>
                            </tr>
                            <tr align="left">
                                <th>Possui Doença</th>
                                <td colspan="3"><?php echo ($gato['doenca'] > 0) ? 'Sim' : 'Não' ?></td>
                            </tr>
                            <tr align="left">
                                <th>Procura um Lar desde</th>
                                <td colspan="3"><?php echo formatarData2($gato['data_cadastro'])?></td>
                            </tr>
                           <tr align="center" class="sem-bg">
                                
                                <td colspan="3" ><a href="?to=apadriar&pet=gato&id=<?php echo $gato['id']?>" class="primary-btn">Apadrinhar</a></td>
                            </tr>
                        </table>
                        <div class="dono">
                           <div class="info-dono">
                              <h1 align="center">Dono</h1>
                           <div class="foto-perfil">
                              <img src="img/usuarios/<?php echo ADOPT::getDonoPet($gato['dono'])['foto_perfil']?>" alt="" style="width: 100px;;">
                           </div>
                              <p><span>Nome:</span> <?php echo ADOPT::getDonoPet($gato['dono'])['nome_completo']?></p>
                              <p><span>Telefone:</span> <a href="https://wa.me/55<?php echo ADOPT::getDonoPet($gato['dono'])['telefone']?>" class="a-hover"><?php echo formatarTelefone(ADOPT::getDonoPet($gato['dono'])['telefone'])?></a></p>
                              <p><span>Email:</span> <a href="mailto:<?php echo ADOPT::getDonoPet($gato['dono'])['email']?>" class="a-hover"><?php echo ADOPT::getDonoPet($gato['dono'])['email']?></a></p>
                              <p><span>Estado:</span> <?php echo ADOPT::getEstado(ADOPT::getDonoPet($gato['dono'])['estado'])['Nome']?></p>
                              <p><span>Cidade:</span> <?php echo ADOPT::getDonoPet($gato['dono'])['cidade']?></p>
                           </div>
                        </div>  
                     </div>
                  </div>
               </div>

            </div>
         </div>                                 
      </div>
   </div>
</section>



