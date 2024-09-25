
<!--  ================== FORMULARIO DE LOGIN ================  -->
<div id="overlay-login">
    <div class="login-container containerFormJS">
    	<a href="#"><img src="img/icones/close.png" width="25px" style="float: right;" class="closeForm" onclick="fecharFormularioLogin()"></a>
    	<center>
        <h2>Login</h2>
        Ainda não tem conta? <a href="#" class="a-hover" onclick="fecharFormularioLogin();mostrarFormularioRegistro()">Registre-se?</a>
    	</center>
        <form id="formLogin">
            <div class="form-group" style="margin-bottom: 0;">
                
                <input type="text" id="usuario_login" name="usuario_login" required placeholder="Usuário">
            </div>
            <div class="form-group"style="margin-bottom: 0;">
                <a href="#" class="a-hover" onclick="fecharFormularioLogin(); mostrarFormularioRecuperarSenha()">Esqueceu a senha?</a>
                <input type="password" id="senha_login" name="senha_login" required placeholder="Senha">
            </div>           
                
            <div id="message"></div>
            <button id="submitLogin" type="submit" class="primary-btn" style="width: 100%; margin-bottom: 10px ;">Entrar</button>

        </form>
    </div>
</div>


<!--  ================== FORMULARIO DE RECUPERAÇÃO DE SENHA ================  -->

<div id="overlay-recuperarSenha">
    <div class="login-container containerFormJS">
      <a href="#"><img src="img/icones/close.png" width="25px" style="float: right;" class="closeForm" onclick="fecharFormularioRecuperarSenha();mostrarFormularioLogin()"></a>
      <center>
        <h2>Recuperação de Senha</h2>
        
      </center>
        <form id="formrecuperarSenha">
            <div class="form-group"> 
                <input type="text" id="email" name="email" required placeholder="E-mail">
            </div>
            <div class="form-group">
                <input type="text" id="usuario" name="usuario" required placeholder="Usuário">
            </div>           
                
           <div id="message-recuperarSenha"></div>
            <button type="submit" id="submitrecuperarSenha" class="primary-btn" style="width: 100%;">Enviar Link de Recuperação</button><br><br>

        </form>
    </div>
</div>