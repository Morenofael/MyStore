<?php
#Nome do arquivo: curtida/list.php
#Objetivo: interface para listagem de curtidas do usuário

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$imagens = $dados["imagens"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/lista-produtos.css" media="all">
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
<div>
    <h3 class="text-center">Produtos curtidas</h3>
    <?php if(!$dados['lista']):?>
        <span class="flex center">Parece que você não curtiu nenhum produto :(</span>
    <?php endif; ?>
    <div class="lista-produtos flex">
        <?php $i = 0?>
        <?php foreach($dados['lista'] as $c): ?>
            <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$c->getProduto()->getId()?>">
                <div>
                    <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[$i][0]->getArquivoNome()?>" alt="" class="lista-produto-img">
                    <h5><?=$c->getProduto()->getNome()?></h5>
                    <span>Preço: R$<?=$c->getProduto()->getPreco()?></span>
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
