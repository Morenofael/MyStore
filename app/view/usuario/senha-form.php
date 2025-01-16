<?php

require_once(__DIR__ . "/../include/header.php");
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/form.css" media="all">
<link rel="stylesheet" href="<?=BASEURL?>/public/css/cadastro-usuario.css" media="all">

<section class="main">
<h4 class="text-center">
   Alterar Senha 
</h4>

<div class="form-container">
            <form id="frmUsuario" method="POST" 
            action="<?= BASEURL ?>/controller/UsuarioController.php?action=editSenha&id=<?=$dados['id']?>" >
                <div class="input-wrapper">
                    <label for="txtSenhaAtual">Senha atual:</label>
                    <input type="password" id="txtSenhaAtual" name="senhaAtual" 
                        placeholder="Informe a senha atual"/>
                </div>
                
                <div class="input-wrapper">
                    <label for="txtSenha">Senha:</label>
                    <input type="password" id="txtSenha" name="senha" 
                         placeholder="Informe a nova senha"/>
                </div>

                <div class="input-wrapper">
                    <label for="txtConfSenha">Confirmação da senha:</label>
                    <input type="password" id="txtConfSenha" name="conf_senha" 
                        placeholder="Informe a confirmação da senha"/>
                </div>
                
                    <input type="hidden" id="hddId" name="id" 
                    value="<?= $dados['id']; ?>" />
                
                <button type="submit">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>            

        <div class="col-12">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
        href="<?= BASEURL ?>/controller/UsuarioController.php?action=display&id=<?= $_SESSION[SESSAO_USUARIO_ID]?>">Voltar</a>
        </div>
    </div>
</div>
</section>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
