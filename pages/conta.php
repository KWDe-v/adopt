<style type="text/css">
 .conta-container {
     display: flex;
     color: white;
     margin: 10% 0;
 }
 .sidebar-conta {
     width: 250px;
     border: 1px solid var(--CorTema);
     border-radius: 7px;
     padding: 20px;
 }
 .sidebar-conta h2 {
     font-size: 18px;
     color: var(--CorTema);
 }
 .sidebar-conta ul {
     list-style-type: none;
     padding: 0;
 }
 .sidebar-conta ul li {
     margin: 20px 0;
 }
 .sidebar-conta ul li a {
     color: #fff;
     text-decoration: none;
     font-size: 16px;
 }
 .sidebar-conta ul li a:hover {
     color: var(--CorTema);
 }
 .main-content-conta {
     flex-grow: 1;
     padding: 20px;
     justify-content: center;
     align-items: center;
     display: flex;
     flex-direction: column;
 }

      #button-troca-foto{
         width: 100%;
         text-align: center;
     }
 .main-content-conta h2 {
     font-size: 24px;
     padding: 0 0 20px 0;
     color: var(--CorTema)
 }
 .user-info {
     display: flex;
 }
 .profile-picture {
     display: flex;
     justify-content: center;
     flex-direction: column;
     align-items: center;
     width: 100%; /* Ajuste conforme necessário */
     height: 100%; /* Ajuste conforme necessário */

 }
 .profile-picture img {
     width: 100px;
     height: 100px;
     margin-bottom: 20px;
     border-radius: 50%;
 }
 .details {
     margin: 40px 0;
     & input[type="text"]{
         width: 100%;
     }
 }
 .details th {
     margin: 10px 0;
     padding-right: 50px;
 }
 .details th {
     margin: 10px 0;
     padding-right: 50px;
 }
</style>
<section class="banner-area relative" id="home" style="  background: url(img/banner-bg<?php echo  $_SESSION['image_bg'] ?>.png) center;background-size: cover;">
   <div class="container">
      <div class="overlay overlay-bg"></div>
      <div class="row d-flex align-items-center justify-content-center">
         <div class="banner-content col-lg-12 col-md-12">
            <div class="db-container conta-container" style="width:auto;">
               <aside class="sidebar-conta">
                  <h2>Configurações de Usuário</h2>
                  <ul>
                     <li><a href="?to=conta">Meus Dados</a></li>
                     <li><a href="?to=conta&meus_pets">Pets Cadastrados</a></li>
                     <li><a href="?to=conta&meus_apadrinhamentos">Apadriamentos</a></li>
                     <li><a href="?to=conta&seguranca">Privacidade e segurança</a></li>
                  </ul>
               </aside>
                <?php if (isset($_GET['meus_pets'])):?>
                  <?php if (isset($_GET['editar'])):?>
                                    <main class="main-content-conta">
                  <h2>
                           <?php echo $pet['nome'] ?></h2>
                  <div class="profile-picture">
                     <img src="<?php echo $pet['imagem'] ?>" alt="pet">
                  </div>
                  <form method="post" action=""  enctype="multipart/form-data">
                    <label for="file-upload" id="button-troca-foto" class="primary-btn">
                        Alterar Foto
                    </label>
                    <input id="file-upload" type="file" name="foto" style="display: none;" />
                     <div class="user-info">
                        <div class="details">
                           <?php echo ADOPT::getMessageSession() ?>
                           <table >
                              <tr>
                                 <th align="left" >* Nome :  </th>
                                 <td>
                                    <input type="text" name="nome" id="id_nome"  placeholder="Ex.:Spike" value="<?php echo $pet['nome'] ?>"/>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Raça :  </th>
                                 <td>
                                    <input type="text" name="raca" id="id_raca"  placeholder="Ex.:Bulldog" value="<?php echo $pet['raca'] ?>"/>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Possui Doença:  </th>
                                 <td>
                                    <select name="doenca" id="id_doenca">
                                       <option value="0" >Não</option>
                                       <option value="1" >Sim</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Peso :  </th>
                                 <td>
                                    <input type="text" name="peso" id="id_peso"  placeholder="Ex.:10Kg" value="<?php echo $pet['peso'] ?>"/>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Idade:  </th>
                                 <td>
                                    
                                    <input type="text" name="idade" id="idade"  placeholder="10" value="<?php echo $pet['idade'] ?>"/>
                                  
                                 </td>
                              </tr>
                           </table>
                           <br><br>
                           <input type="submit" class="primary-btn" value="Salvar" style="width:100%;" />
                  </form>
               </main>
                  <?php elseif (isset($_GET['cadastrar_pet'])):?>
                                    <main class="main-content-conta">
                  <h2>
                           Cadastrar Pet</h2>
                  <div class="profile-picture">
                     <img src="img/notfound.png" alt="pet">
                  </div>
                  <form method="post" action=""  enctype="multipart/form-data">
                    <label for="file-upload" id="button-troca-foto" class="primary-btn">
                       * Adicionar Foto
                    </label>
                    <input id="file-upload" type="file" name="foto" style="display: none;" />
                     <div class="user-info">
                        <div class="details">
                           <?php echo ADOPT::getMessageSession() ?>
                           <table >
                              <tr>
                                 <th align="left" >* Nome :  </th>
                                 <td>
                                    <input type="text" name="nome" id="id_nome"  placeholder="Ex.:Spike" />
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Raça :  </th>
                                 <td>
                                    <input type="text" name="raca" id="id_raca"  placeholder="Ex.:Bulldog" />
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Possui Doença:  </th>
                                 <td>
                                    <select name="doenca" id="id_doenca">
                                       <option value="" disabled selected>Possui Doenca</option>
                                       <option value="0" >Não</option>
                                       <option value="1" >Sim</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Peso :  </th>
                                 <td>
                                    <input type="text" name="peso" id="id_peso"  placeholder="Ex.:10Kg" />
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Tamanho:  </th>
                                 <td>
                                    <select name="tamanho" id="id_tamanho">
                                       <option value="" disabled selected >Selecione o Tamanho</option>
                                       <option value="Pequeno" >Pequeno</option>
                                       <option value="Médio" >Médio</option>
                                       <option value="Grande" >Grande</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Idade:  </th>
                                 <td>
                                    
                                    <input type="text" name="idade" id="idade"  placeholder="10" />
                                  
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Tipo:  </th>
                                 <td>
                                    <select name="tipo" id="id_tipo">
                                       <option value="" disabled selected >Selecione o Tipo</option>
                                       <option value="cachorros" >Cachorro</option>
                                       <option value="gatos" >Gato</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                           <br><br>
                           <input type="submit" class="primary-btn" value="Adicionar" style="width:100%;" />
                  </form>
               </main>
                  <?php else:?>
               <main class="main-content-conta">
                  <h2>Meus Pets</h2>
                     <div class="user-info">
                        <div class="details">
                           <?php echo ADOPT::getMessageSession() ?>
                           
                          <?php if(($paginated_pets )&& (count($pets) >= 3 && count($pets) < 9)):?>
                        <a href="?to=conta&meus_pets&cadastrar_pet" class="primary-btn text-center" >Cadastrar Pet</a>

                                 <div class="search-box">

         <form id="buscarGatos" method="get" action="">
            <input name="to" type="hidden" value="conta" />
            <input name="meus_pets" type="hidden" value="" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Nome ou Raça" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <button type="submit" class="fas fa-search btn-filter" style="width:55px; height: 45px;"></button>
         </form>
      </div>
     <?php endif?>
           <?php if($paginated_pets):?>
      <table class="lista-pets-conta">
          <?php
          $count = 0; 

          foreach ($paginated_pets as $pet):
              if ($count % 3 == 0): 
                  if ($count > 0) echo '</tr>'; 
                  echo '<tr>';
              endif;
          ?>
              <td>
                  <img src="<?php echo $pet['imagem'] ?>" alt="pet"><br><br>
                  <p>Nome: <?php echo $pet['nome'] ?></p>
                  <p>Raça: <?php echo $pet['raca'] ?></p>
                  <p>Tamanho: <?php echo $pet['tamanho'] ?></p>
                  <p>Peso: <?php echo $pet['peso'] ?></p>
                  <p>Idade: <?php echo $pet['idade'] ?> Anos</p>
                  <p>Doença: <?php echo ($pet['doenca'] == 1) ?'Sim' : 'Não' ?> </p>
                  <div style="display:flex; gap: 10px;">
                     <?php if ($pet['adotado'] == 1): ?>
                     <a href="?to=conta&meus_pets&ativar&tipo=<?php echo $pet['tipo'] ?>&id=<?php echo $pet['id'] ?>&page=<?php echo $pagina ?>" class="primary-btn">Ativar</a>
                     <?php else: ?>
                     <a href="?to=conta&meus_pets&desativar&tipo=<?php echo $pet['tipo'] ?>&id=<?php echo $pet['id'] ?>&page=<?php echo $pagina ?>" class="primary-btn">Desativar</a>
                     <?php endif ?>
                     <a href="?to=conta&meus_pets&editar&tipo=<?php echo $pet['tipo'] ?>&id=<?php echo $pet['id'] ?>" class="primary-btn">Editar</a>
                  </div>
              </td>
          <?php
              $count++;
          endforeach;
          if ($count % 3 != 0) echo '</tr>';
          ?>
      </table>
<?php if($paginated_pets && count($pets) > 9):?>
      <div class="footer-table">
         <a class="btn-footer-anterior <?php if ($page <= 1) echo 'disable'; ?>" href="<?php echo $prev_page_url; ?>" align="center" style="width: 75px;">Anterior</a>
         <span id="paginas"><?php echo $page . ' de ' . $total_pages; ?></span>
         <a class="btn-footer-proximo <?php if ($page == $total_pages) echo 'disable'; ?>" href="<?php echo $next_page_url; ?>" align="center"style="width: 75px;">Próximo</a>
      </div>
      <div class="footer-table">
         <form id="page-form" onsubmit="goToPage(event)">
            <label for="page-number" style="color:white;">Ir Para:</label>
            <input type="number" id="page-number" name="page" style="width: 75px;" min="1"max="<?php echo $total_pages; ?>">
            <button class="btn-filter" type="submit" style="width: 50px;">Ir</button>
         </form>
      </div>
      <?php endif?><br>
      <?php if($paginated_pets && count($pets) < 3):?>
       <a href="?to=conta&meus_pets&cadastrar_pet" class="primary-btn text-center" style="width:100%;">Cadastrar Pet</a>
       <?php endif?>
      <?php else:?>
         <div class="pet-not-found">
            <h2>Nenhum resultado encontrado </h2>
            <img src="img/notfound.png">
            
            <p><a href="?to=conta&meus_pets&cadastrar_pet" class="primary-btn"> Cadastrar Pet.</a></p>
         </div>
      <?php endif?>
      <?php endif?>
                        </div>
                     </div>
               </main>
                <?php elseif (isset($_GET['meus_apadrinhamentos'])):?>

                <?php elseif (isset($_GET['seguranca'])):?>
               <main class="main-content-conta">
                  <h2>Privacidade e segurança</h2>
                     <div class="user-info">
                        <div class="details">
                           <?php echo ADOPT::getMessageSession() ?>
                           <table >
                            <tr>
                                <td>
                                    Email:
                                 </td>
                                 <th align="left" ><input type="text" value="<?php echo $email?>" class="disabled"/></th>
                                 <td>
                                    <a class="primary-btn" href="javascript:void(0);" onclick="mostrarAlterarEmail();">Alterar</a> 
                                 </td>
                              </tr>
                              
                            <tr>
                                <td style="padding-right: 50px;">
                                    Senha:
                                 </td>
                                 <th align="left" ><input type="password" value="<?php echo $senha?>" class="disabled"/></th>
                                 <td>
                                    <a class="primary-btn" href="javascript:void(0);" onclick="mostrarAlterarSenha();">Alterar</a> 
                                 </td>
                              </tr>

                           </table>
                        </div>
                     </div>
               </main>
                <?php else:?>
               <main class="main-content-conta">
                  <h2>Minha conta</h2>
                  <div class="profile-picture">
                     <?php if (strtolower($sexo) == 'm'):?>
                        <img src="img/usuarios/<?php echo (file_exists("img/usuarios/" . $foto_perfil) && !empty($foto_perfil)) ? $foto_perfil : 'semfoto_m.png'; ?>" alt="Foto de Perfil">
                    <?php else:?>
                        <img src="img/usuarios/<?php echo (file_exists("img/usuarios/" . $foto_perfil) && !empty($foto_perfil)) ? $foto_perfil : 'semfoto_f.png'; ?>" alt="Foto de Perfil">
                    <?php endif?> 
                  </div>
                  <form method="post" action=""  enctype="multipart/form-data">
                    <label for="file-upload" id="button-troca-foto" class="primary-btn">
                        Alterar Foto
                    </label>
                    <input id="file-upload" type="file" name="foto_perfil" style="display: none;" />
                     <div class="user-info">
                        <div class="details">
                           <?php echo ADOPT::getMessageSession() ?>
                           <table >
                              <tr>
                                 <th align="left" >* Nome Completo:  </th>
                                 <td>
                                    <input type="text" name="nome_completo" id="id_nome_completo"  placeholder="Ex.:Maria Silva" value="<?php echo (isset($nome_completo)) ?$nome_completo :''?>"/>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* CPF:  </th>
                                 <td>
                                    <?php if (isset($CPF) && !empty($CPF)):?>
                                    <input type="text" value="<?php echo formatarCPF(openssl_decrypt($CPF, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678')) ;?>" class="disabled"/>
                                    <input type="hidden" name="cpf" id="cpf"  value="<?php echo openssl_decrypt($CPF, 'aes-256-cbc', $config['Encrypted_Key_Dados'], 0, '1234567812345678')?>"/>
                                    <?php else:?>
                                    <input type="text" name="cpf" id="cpf"  placeholder="12345678909" value=""/>
                                    <?php endif?>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Estado Civíl:  </th>
                                 <td>
                                    <select name="estado_civil" id="id_estado_civil">
                                       <!-- Opção padrão -->
                                       <option value="" disabled <?php if (empty($estado_civil)) echo 'selected'; ?>>Estado Civil</option>
                                       <!-- Lista de opções -->
                                       <?php 
                                          $opcoes = [];
                                          
                                          if ($sexo == 'M') {
                                              $opcoes = ['Solteiro', 'Casado', 'Divorciado'];
                                          } else {
                                              $opcoes = ['Solteira', 'Casada', 'Divorciada'];
                                          }
                                          
                                          foreach ($opcoes as $opcao) {
                                              
                                              $selected = ($estado_civil == $opcao) ? 'selected' : '';
                                              echo "<option value=\"$opcao\" $selected>$opcao</option>";
                                          }
                                          ?>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Email:  </th>
                                 <td>
                                    <?php if (isset($email) && !empty($email)):?>
                                    <input type="text" value="<?php echo $email?>" class="disabled"/>
                                    <input type="hidden" name="email" id="email"  value="<?php echo $email?>"/>
                                    <?php else:?>
                                    <input type="text" name="email" id="email"  placeholder="exemple@email.com" value=""/>
                                    <?php endif?>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Telefone:  </th>
                                 <td>
                                    
                                    <input type="text" name="telefone" id="telefone"  placeholder="12912345678" value="<?php echo (isset($telefone)) ?$telefone :''?>"/>
                                  
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Estado:  </th>
                                 <td>
                                    <select name="estado" id="id_estado">
                                       <?php if (isset($estado) && !empty($estado)): ?>
                                       <option value="<?php echo $estado; ?>" selected><?php echo $estados[$estado-1]['Nome']; ?></option>
                                       <?php else: ?>
                                       <option>Selecione seu Estado</option>
                                       <?php endif; ?>
                                       <?php foreach ($estados as $key => $value): ?>
                                       <?php if ($key+1 != $estado):?>
                                       <option value="<?php echo $key+1; ?>"><?php echo $value['Nome']; ?></option>
                                       <?php endif; ?>
                                       <?php endforeach; ?>
                                    </select>
                                 </td>
                              </tr>
                              <tr>
                                 <th align="left" >* Cidade:  </th>
                                 <td>
                                    <input type="text" name="cidade" id="id_cidade"  placeholder="Ex.: São Paulo " value="<?php echo (isset($cidade)) ? $cidade :''?>"/>
                                 </td>
                              </tr>
                           </table>
                           <br><br>
                           <input type="submit" class="primary-btn" value="Salvar" style="width:100%;" />
                  </form>
               </main>
               <?php endif?>
            </div>
         </div>
      </div>
   </div>
</section>



<!-- ==============FORMULARIOS DE ALTERAÇÃO ============== -->


<!-- ==================  TROCA DE SENHA ================ -->
<div id="overlay-AlterarSenha">
   <div class="containerFormsJS" style="padding-bottom: 50px;">
      <h1 class="text-white" align="center" style="padding-top: 30px;">Troca de Senha</h1>
      <form id="formTrocarSenha">
         <a href="javascript:void(0);" style="float: right;" onclick="fecharAlterarSenha()" class="closeForm"><img src="img/icones/close.png" ></a>
         <center>
            <input type="password" name="senhaatual" id="senhaatual" placeholder="Senha Atual">
            <input type="hidden" name="IDformTrocarSenha" id="IDformTrocarSenha" value="<?php echo rand();?>" >
            <input type="password" name="senhanova" id="senhanova" placeholder="Nova Senha">
            <input type="password" name="confsenhanova" id="confsenhanova" placeholder="Confirmar Nova Senha">
         </center>
         <div id="message-TrocarSenha"></div>
         <button id="submitTrocarSenha" type="submit" class="primary-btn"style="width: 100%;">Trocar Senha</button>
      </form>
   </div>
</div>
<!-- ==================  TROCA DE EMAIL ================ -->
<div id="overlay-AlterarEmail">
   <div class="containerFormsJS" style="padding-bottom: 50px;">
      <h1 class="text-white" align="center" style="padding-top: 30px;">Troca de Email</h1>
      <form id="formTrocarEmail">
         <a href="javascript:void(0);" style="float: right;" onclick="fecharAlterarEmail()" class="closeForm"><img src="img/icones/close.png" ></a>
         <center>
            <input type="email" name="emailatual" id="emailatual" placeholder="Email Atual">
            <input type="hidden" name="IDformTrocarEmail" id="IDformTrocarEmail" value="<?php echo rand();?>" >
            <input type="email" name="emailnovo" id="emailnovo" placeholder="Novo Email">
            <input type="email" name="confemailnovo" id="confemailnovo" placeholder="Confirmar Novo Email">
            <input type="password" name="senhaatual_email" id="senhaatual_email" placeholder="Senha Atual">
         </center>
         <div id="message-TrocarEmail"></div>
         <button id="submitTrocarEmail" type="submit" class="primary-btn"style="width: 100%;">Trocar Email</button>
      </form>
   </div>
</div>
