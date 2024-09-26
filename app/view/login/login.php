<?php
#Nome do arquivo: login/login.php
#Objetivo: interface para logar no sistema

require_once(__DIR__ . "/../include/header.php");
?>
<!-- TODO perguntar para o professor se não é melhor não usar o BASEURL-->
<link rel="stylesheet" href="<?=BASEURL?>/view/login/login.css" media="all">
<section class="main">
<h4>LOGIN</h4>
    <div class="form-container">

                <!-- Formulário de login -->
                <form id="frmLogin" action="./LoginController.php?action=logon" method="POST" >
                    <div class="form-group">
                        <label for="txtLogin">Email:</label>
                        <input type="text" class="form-control" name="login" id="txtLogin"
                            placeholder="Informe o email"
                            value="<?php echo isset($dados['login']) ? $dados['login'] : '' ?>" />        
                    </div>

                    <div class="form-group">
                        <label for="txtSenha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="txtSenha"
                            maxlength="15" placeholder="Informe a senha"
                            value="<?php echo isset($dados['senha']) ? $dados['senha'] : '' ?>" />        
                    </div>

                    <button type="submit" class="btn btn-success">Logar</button>
                </form>
                <a href="/app/controller/UsuarioController.php?action=create" class="btn btn-primary">Cadastre-se</a>

        <div class="col-6">
            <?php include_once(__DIR__ . "/../include/msg.php") ?>
        </div>
    </div>
</section>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
