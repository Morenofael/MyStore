<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$imagens = $dados["imagens"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/lista-produtos.css" media="all">
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
    <div>
    <form id="frmSearch" action="./ProdutoController.php" method="GET">
        <input type="hidden" name="action" value="listByTags">
        <input type="text" name="q" id="txtQuery" placeholder="Pesquise produtos">
        <button type="submit"><img src="<?= BASEURL ?>/view/img/svg/bussola.svg" alt="Engrenagem" class="icon"></button>
    </form>
    <h3 class="text-center">Produtos</h3>

    <div class="lista-produtos flex">
        <?php $i = 0?>
        <?php foreach($dados['lista'] as $p): ?>
            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$p->getId()?>">
                <div>
                    <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[$i][0]->getArquivoNome()?>" alt="" class="lista-produto-img">
                    <h5><?=$p->getNome()?></h5>
                    <span>Preço: R$<?=$p->getPreco()?></span>
                </div>
            </a>
        <?php $i++?>
        <?php endforeach; ?>
    </div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
