<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$produto = $dados["produto"];
echo "<pre>" . print_r($dados["produto"]) . "</pre>";
echo "<pre>" . print_r($dados["vendedor"]) . "</pre>";
?>
<h3 class="text-center">
    <?= $produto->getNome()?>
</h3>
<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
           <h4><?= $produto->getDescricao()?></h4>
           <h4>R$<?= $produto->getPreco()?></h4> 
        </div>

    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
        <?php if($brecho->getId_usuario() == $_SESSION[SESSAO_USUARIO_ID]):?>
        <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/BrechoController.php?action=edit&id=<?=$brecho->getId()?>">Editar</a>
        <?php endif;?>
        <ul>
            <?php foreach($produtos as $p): ?>
                <li>
                    <?=$p->getNome()?>
                </li> 
            <?php endforeach; ?>
        </ul>
        
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
