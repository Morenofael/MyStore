<?php
#Nome do arquivo: brecho/form.php
#Objetivo: interface para inserção dos brechós do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?>
   Endereco 
</h3>
<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmUsuario" method="POST"
                action="<?= BASEURL ?>/controller/EnderecoController.php?action=save" >
                <div class="form-group">
                    <label for="txtRua">Rua:</label>
                    <input class="form-control" type="text" id="txtRua" name="rua"
                        maxlength="70" placeholder="Informe o rua"
                        value="<?php echo (isset($dados["endereco"]) ? $dados["endereco"]->getRua() : ''); ?>" />
                </div>
                <div class="form-group">
                    <label for="txtNumero">Numero:</label>
                    <input class="form-control" type="text" id="txtNumero" name="numero"
                        maxlength="5" placeholder="Informe o número"
                        value="<?php echo (isset($dados["endereco"]) ? $dados["endereco"]->getNumero() : ''); ?>" />
                </div>
                <div class="form-group">
                    <label for="txtBairro">Bairro:</label>
                    <input class="form-control" type="text" id="txtBairro" name="bairro"
                        maxlength="65" placeholder="Informe o bairro"
                        value="<?php echo (isset($dados["endereco"]) ? $dados["endereco"]->getBairro() : ''); ?>" />
                </div>


                <input type="hidden" id="hddId" name="id"
                    value="<?= $dados['id']; ?>" />

                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>
        </div>

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
