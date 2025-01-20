<?php
#View para a home do sistema

require_once __DIR__ . "/../include/header.php";
require_once __DIR__ . "/../include/menu.php";
$produtos = array_reverse($dados["produtos"]);
$imagens = array_reverse($dados["imagens"]);
?>
<link rel="stylesheet" href="<?= BASEURL ?>/public/css/home.css">
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
    <div class="main-content">
        <form id="frmSearch" action="./ProdutoController.php" method="GET">
            <input type="hidden" name="action" value="listByTags">
            <input type="text" name="q" id="txtQuery" placeholder="Pesquise produtos">
            <button type="submit"><img src="<?= BASEURL ?>/view/img/svg/bussola.svg" alt="Engrenagem" class="icon"></button>
        </form>
        <div id="main-produto">
            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[0]->getId()?>"><img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[0][0]->getArquivoNome()?>" alt=""></a>
            <div class="main-produto-info-wrapper">
                <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[0]->getId()?>"><h4><?=$produtos[0]->getNome()?></h4></a>
                <span><?=$produtos[0]->getDescricao()?></span>
                <h5>Preço: <?=$produtos[0]->getPrecoReais()?></h5>
                <div class="flex botoes-produto-wrapper">
                    <button onclick="curtir(this)" data-idProduto="<?=$produtos[0]->getId()?>" id="buttonCurtir" class="btn botao"><img class="icon" src="<?=BASEURL?>/view/img/svg/coracao.svg" alt="coração"><span>Curtir</span></button>
                    <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[0]->getId()?>" class="btn botao"><span>Comprar</span></a>
                </div>
            </div>
         </div>

        <div class="sec-produtos flex">
            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[1]->getId()?>">
                <div>
                     <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[1][0]->getArquivoNome()?>" alt="" class="sec-produto-img">
                    <h5><?=$produtos[1]->getNome()?></h5>
                    <span>Preço: <?=$produtos[1]->getPreco()?></span>
                </div>
            </a>

            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[2]->getId()?>">
                <div>
                     <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[2][0]->getArquivoNome()?>" alt="" class="sec-produto-img">
                    <h5><?=$produtos[2]->getNome()?></h5>
                    <span>Preço: <?=$produtos[2]->getPreco()?></span>
                </div>
            </a>

            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produtos[3]->getId()?>">
                <div>
                     <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[3][0]->getArquivoNome()?>" alt="" class="sec-produto-img">
                    <h5><?=$produtos[3]->getNome()?></h5>
                    <span>Preço: <?=$produtos[3]->getPreco()?></span>
                </div>
            </a>
        </div>
        <div class="flex cat-princ">
            <a id="ver-tudo" href="<?=BASEURL?>/controller/ProdutoController.php?action=list">Ver tudo</a>
        </div>
    </div>

</div>

<input id="ipnBaseUrl" type="hidden" value="<?= BASEURL ?>">
<script src="<?= BASEURL ?>/public/js/home.js"></script>
<script src="<?= BASEURL ?>/public/js/curtida.js"></script>

<?php require_once __DIR__ . "/../include/footer.php";?>
