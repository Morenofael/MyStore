<?php
#Nome do arquivo: brecho/brecho.php
#Objetivo: interface para vizualização de brechós

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$brecho = $dados["brecho"];
$produtos = $dados["produtos"];
$imagens = $dados["imagens"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/lista-produtos.css" media="all">
<div class="main">
<?php include_once(__DIR__ . "/../include/sidebar.php");?>
    <div>
    <h3 class="text-center">
        <?= $brecho->getNome()?>
    </h3>
    <div class="col-6">
        <h4><?= $brecho->getDescricao()?></h4> 
    </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-12">
            <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
            <?php if($brecho->getId_usuario() == $_SESSION[SESSAO_USUARIO_ID]):?>
            <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/BrechoController.php?action=edit&id=<?=$brecho->getId()?>">Editar</a>
            <a class="btn btn-primary"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=create">Adicionar produto</a>
            </div>
            <?php endif;?>
            <div class="lista-produtos flex">
            <?php $i = 0 ?>
            <?php foreach($produtos as $p): ?>
                <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$p->getId()?>">
                <div>
                    <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[$i][0]->getArquivoNome()?>" alt="" class="lista-produto-img">
                    <h5><?=$p->getNome()?></h5>
                    <span>Preço: R$<?=$p->getPreco()?></span>
                </div>
                </a>   
            <?php $i++ ?>             
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</div>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
