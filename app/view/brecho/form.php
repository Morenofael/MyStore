<?php
#Nome do arquivo: brecho/form.php
#Objetivo: interface para inserção dos brechós do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?>
    Brechó
</h3>
<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
            <form id="frmUsuario" method="POST"
                action="<?= BASEURL ?>/controller/BrechoController.php?action=save" >
                <div class="form-group">
                    <label for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome"
                        maxlength="70" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["nome"]) ? $dados["nome"] : ''); ?>" />
                </div>
                <div class="form-group">
                    <label for="txtDescricao">Descrição:</label>
                    <textarea class="form-control" type="text" id="txtDescricao" name="descricao"
                        maxlength="1000" placeholder="Informe a descrição" rows="15"
                        ><?php echo (isset($dados["descricao"]) ? $dados["descricao"] : ''); ?></textarea>
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
