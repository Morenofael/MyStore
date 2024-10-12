<?php
#Nome do arquivo: brecho/form.php
#Objetivo: interface para inserção dos brechós do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
    <link rel="stylesheet" href="<?=BASEURL?>/public/css/form.css" media="all">

<section class="main">
<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?>
   Endereco 
</h3>

    <div class="row" style="margin-top: 10px;">

        <div class="form-container">
            <form id="frmUsuario" method="POST"
                action="<?= BASEURL ?>/controller/EnderecoController.php?action=save" >
                <div class="input-wrapper">
                    <label for="txtCep">CEP:</label>
                    <input type="text" id="txtCep" name="cep"
                        maxlength="8" placeholder="Informe o cep"
                        value="<?php echo (isset($dados["endereco"]) ? $dados["endereco"]->getCep() : ''); ?>" />
                </div>
                <div class="input-wrapper">
                    <label for="txtNumero">Numero:</label>
                    <input type="text" id="txtNumero" name="numero"
                        maxlength="6" placeholder="Informe o número"
                        value="<?php echo (isset($dados["endereco"]) ? $dados["endereco"]->getNumero() : ''); ?>" />
                </div>
                
                <input type="hidden" id="hddId" name="id"
                    value="<?= $dados['id']; ?>" />

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
                href="<?= BASEURL ?>/../">Voltar</a>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
