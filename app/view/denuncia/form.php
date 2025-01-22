<?php
#Nome do arquivo: denuncia/form.php
#Objetivo: interface para denuncias produtos no sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
    <link rel="stylesheet" href="<?=BASEURL?>/public/css/form.css" media="all">

<section class="main">
    <h3 class="text-center">
       Denúncia 
    </h3>
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="form-container">
            <form id="frmProduto" method="POST" enctype='multipart/form-data'
                action="<?= BASEURL ?>/controller/DenunciaController.php?action=save" >
                <div class="input-wrapper">
                    <label for="fileImagem" class="custom-file-upload">Comprovante PIX</label>
                    <input name="file[]" type="file" id="fileImagem">
                </div>
                
                <div class="input-wrapper">
                    <label for="txtDescricao">Descrição:</label>
                    <textarea type="text" id="txtDescricao" name="texto" maxlength="1000" placeholder="Descreva o problema com o produto." rows="15"></textarea>
                </div>
                <input type="hidden" id="hddIdPedido" name="idPedido" value="<?=$dados["idPedido"]?>">
                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>            
        </div>
</section>
        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/HomeController.php?action=home">Voltar</a>
        </div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
