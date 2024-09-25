<div id="overlay-registro">
    <div class="login-container containerFormJS">
      <a href="javascript:void(0);"><img src="img/icones/close.png" width="25px" style="float: right;" class="closeForm" onclick="fecharFormularioRegistro()"></a>
      <center>
        <h2>Registro</h2>
       Já tem uma conta? <a href="javascript:void(0);" class="a-hover" onclick="fecharFormularioRegistro();mostrarFormularioLogin()">Entre Já!</a>
      </center>
        <form id="formRegistro">
            <div class="form-group" style="margin-bottom: 0;">
                
                <input type="text" id="usuario_registro" name="usuario_registro"  placeholder="Usuário">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
               
                <input type="password" id="senha_registro" name="senha_registro"  placeholder="Senha">
            </div>           
                
            <div class="form-group" style="margin-bottom: 0;">
               
                <input type="password" id="confirmarsenha" name="confirmarsenha"  placeholder="Confirmar Senha">
            </div> 
            <div class="form-group" style="margin-bottom: 0;">
               
                <input type="email" id="email_registro" name="email_registro"  placeholder="E-mail">
            </div>           
           <div class="form-group" style="margin-bottom: 10px;">
            <input type="date" id="nascimento" name="nascimento" >
         </div>
          <div class="form-group" style="margin-bottom: 10px;">
            <select name="genero" id="genero">
               <option value="M">Masculino</option>
               <option value="F">Feminino</option>
            </select>
           </div>          
           <div class="form-group" style="margin-bottom: 10px;">
            <input type="checkbox" name="termos" id="termos"> concordar com nossos <a href="javascript:void(0);" onclick="fecharFormularioRegistro();mostrarTermos();" class="a-hover">Termos & Condições</a>
           </div>
           <div id="message_registro"></div>
            <button id="submitRegistro" type="submit" class="primary-btn" style="width: 100%;">Entrar</button><br>

        </form>
    </div>
</div>


<div id="overlay-termos">
   <div id="termos-container">
      <div class="termos-container text-white">
         <div class="termos-content">
            <a  href="javascript:void(0);" onclick="fecharTermos();mostrarFormularioRegistro()" class="closeForm"><img src="img/icones/close.png" width="25px" ></a>

            <h2 align="center" style="color: white;">Esta política de Termos de Uso e Serviço é válida a partir de <script>document.write(new Date().getFullYear());</script>.</h2>
            <h4 class="text-white"><?php echo$config['NameSite']; ?>, pessoa jurídica de direito privado descreve, através deste documento, as regras de uso do site <?php echo$config['NameSite']; ?> e qualquer outro site, loja ou aplicativo operado pelo proprietário.</h4>
            <br>
            Ao navegar neste website, consideramos que você está de acordo com os Termos de Uso e Serviço abaixo.<br><br>
            Caso você não esteja de acordo com as condições deste contrato, pedimos que não faça mais uso deste website, muito menos cadastre-se ou envie os seus dados pessoais.
            Se modificarmos nossos Termos de Uso e Serviço, publicaremos o novo texto neste website, com a data de revisão atualizada. Podemos alterar este documento a qualquer momento. Caso haja alteração significativa nos termos deste contrato, podemos informá-lo por meio das informações de contato que tivermos em nosso banco de dados ou por meio de notificações.<br><br>
            A utilização deste website após as alterações significa que você aceitou os Termos de Uso e Serviço revisados. Caso, após a leitura da versão revisada, você não esteja de acordo com seus termos, favor encerrar o seu acesso.<br><br>
            Seção 1 - Usuário
            A utilização deste website atribui de forma automática a condição de Usuário e implica a plena aceitação de todas as diretrizes e condições incluídas nestes Termos.<br><br>
            Seção 2 - Adesão em conjunto com a Política de Privacidade<br><br>
            A utilização deste website acarreta a adesão aos presentes Termos de Uso e Serviço e a versão mais atualizada da Política de Privacidade de <?php echo$config['NameSite']; ?>.<br><br>
            Seção 3 - Condições de acesso<br><br>
            Em geral, o acesso ao website da <?php echo$config['NameSite']; ?> possui caráter gratuito e não exige prévia inscrição ou registro<br><br>
            Contudo, para usufruir de algumas funcionalidades, o usuário poderá precisar efetuar um cadastro, criando uma conta de usuário com login e senha próprios para acesso.<br><br>
            É de total responsabilidade do usuário fornecer apenas informações corretas, autênticas, válidas, completas e atualizadas, bem como não divulgar o seu login e senha para terceiros.<br><br>
            Partes deste website oferecem ao usuário a opção de publicar comentários em determinadas áreas. <?php echo$config['NameSite']; ?> não consente com a publicação de conteúdos que tenham natureza discriminatória, ofensiva ou ilícita, ou ainda infrinjam direitos de autor ou quaisquer outros direitos de terceiros.<br><br>
            A publicação de quaisquer conteúdos pelo usuário deste website, incluindo mensagens e comentários, implica em licença não-exclusiva, irrevogável e irretratável, para sua utilização, reprodução e publicação pela <?php echo$config['NameSite']; ?> no seu website, plataformas e aplicações de internet, ou ainda em outras plataformas, sem qualquer restrição ou limitação.<br><br>
            Seção 4 - Cookies<br><br>
            Informações sobre o seu uso neste website podem ser coletadas a partir de cookies. Cookies são informações armazenadas diretamente no computador que você está utilizando. Os cookies permitem a coleta de informações tais como o tipo de navegador, o tempo despendido no website, as páginas visitadas, as preferências de idioma, e outros dados de tráfego anônimos. Nós e nossos prestadores de serviços utilizamos informações para proteção de segurança, para facilitar a navegação, exibir informações de modo mais eficiente, e personalizar sua experiência ao utilizar este website, assim como para rastreamento online. Também coletamos informações estatísticas sobre o uso do website para aprimoramento contínuo do nosso design e funcionalidade, para entender como o website é utilizado e para auxiliá-lo a solucionar questões relevantes.<br><br>
            Caso não deseje que suas informações sejam coletadas por meio de cookies, há um procedimento simples na maior parte dos navegadores que permite que os cookies sejam automaticamente rejeitados, ou oferece a opção de aceitar ou rejeitar a transferência de um cookie (ou cookies) específico(s) de um site determinado para o seu computador. Entretanto, isso pode gerar inconvenientes no uso do website.<br><br>
            As definições que escolher podem afetar a sua experiência de navegação e o funcionamento que exige a utilização de cookies. Neste sentido, rejeitamos qualquer responsabilidade pelas consequências resultantes do funcionamento limitado deste website provocado pela desativação de cookies no seu dispositivo (incapacidade de definir ou ler um cookie).<br><br>
            Seção 5 - Propriedade Intelectual<br><br>
            Todos os elementos de <?php echo$config['NameSite']; ?> são de propriedade intelectual da mesma ou de seus licenciados. Estes Termos ou a utilização do website não concede a você qualquer licença ou direito de uso dos direitos de propriedade intelectual da <?php echo$config['NameSite']; ?> ou de terceiros.
            Seção 6 - Links para sites de terceiros<br><br>
            Este website poderá, de tempos a tempos, conter links de hipertexto que redirecionará você para sites das redes dos nossos parceiros, anunciantes, fornecedores etc. Se você clicar em um desses links para qualquer um desses sites, lembre-se que cada site possui as suas próprias práticas de privacidade e que não somos responsáveis por essas políticas. Consulte as referidas políticas antes de enviar quaisquer Dados Pessoais para esses sites.<br><br>
            Não nos responsabilizamos pelas políticas e práticas de coleta, uso e divulgação (incluindo práticas de proteção de dados) de outras organizações, tais como Facebook, Apple, Google, Microsoft, ou de qualquer outro desenvolvedor de software ou provedor de aplicativo, loja de mídia social, sistema operacional, prestador de serviços de internet sem fio ou fabricante de dispositivos, incluindo todos os Dados Pessoais que divulgar para outras organizações por meio dos aplicativos, relacionadas a tais aplicativos, ou publicadas em nossas páginas em mídias sociais. Nós recomendamos que você se informe sobre a política de privacidade e Termos de Uso e Serviço de cada site visitado ou de cada prestador de serviço utilizado.<br><br>
            Seção 7 - Prazos e alterações<br><br>
            O funcionamento deste website se dá por prazo indeterminado.<br><br>
            O website no todo ou em cada uma das suas seções, pode ser encerrado, suspenso ou interrompido unilateralmente por <?php echo$config['NameSite']; ?>, a qualquer momento e sem necessidade de prévio aviso.<br><br>
            Seção 8 - Dados pessoais<br><br>
            Durante a utilização deste website, certos dados pessoais serão coletados e tratados por <?php echo$config['NameSite']; ?> e/ou pelos Parceiros. As regras relacionadas ao tratamento de dados pessoais de <?php echo$config['NameSite']; ?> estão estipuladas na Política de Privacidade.<br><br>
            Seção 9 - Contato<br><br>
            <p>Caso você tenha qualquer dúvida sobre os Termos de Uso e Serviço, por favor, entre em contato pelo numero de whatsapp: <a class="a-hover" href='http://wa.me/55<?php echo$config['WhatsappNumber']; ?>'><?php echo$config['WhatsappNumber']; ?></a> ou <a class="a-hover" href="<?php echo $config['LinkInstagram']; ?>">Instagram</a> Desde já, agradecemos!</p>
         </div>
      </div>
   </div>
</div>
</div>