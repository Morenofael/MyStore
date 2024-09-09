<?php
#Nome do arquivo: brecho/brecho.php
#Objetivo: interface para vizualização de brechós

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
require_once(__DIR__ . "/../../model/Brecho.php");
$brecho = $dados["brecho"];
?>
<h3 class="text-center">
    <?= $brecho->getNome()?>
</h3>
<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
           <h4><?= $brecho->getDescricao()?></h4> 
        </div>

    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
        <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/BrechoController.php?action=edit&id=<?=$brecho->getId()?>">Editar</a>
        </div>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
