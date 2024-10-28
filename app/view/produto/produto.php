<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$produto = $dados["produto"];
$vendedor = $dados["vendedor"];
$imagens = $dados["imagens"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/produto.css" media="all">
<h3 class="text-center">
    <?= $produto->getNome()?>
</h3>
<section class="main">
    <div class="esquerda">
        <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[0]->getArquivoNome()?>" alt="">
        <h4><?= $produto->getDescricao()?></h4>
        <h4>R$<?= $produto->getPreco()?></h4> 
        <h4>Gênero:<?= $dados["generoString"]?></h4> 
    </div>
    <div class="direita">
        <h3><?=$produto->getNome()?></h3>
        <div id="metodos-pagamento">
            <a href="<?=BASEURL?>/controller/PedidoController.php?action=save&id=<?=$produto->getId()?>">Reservar Produto</a>
        </div>
    </div>
    <div class="flex botoes-produto-wrapper">
        <button onclick="curtir(this)" data-idProduto="<?=$produto->getId()?>"><img class="icon" src="<?=BASEURL?>/view/img/svg/coracao.svg" alt="coração"><span>Curtir</span></button>
        <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$produto->getId()?>"><span>Comprar</span>
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
        <?php if($vendedor->getId() == $_SESSION[SESSAO_USUARIO_ID]):?>
        <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=edit&id=<?=$produto->getId()?>">Editar</a>
        <a class="btn btn-danger" onclick="confirm('deseja excluir?')"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=delete&id=<?=$produto->getId()?>">Excluir</a>
        <?php endif;?>
        
        </div>
    </div>
<input id="ipnBaseUrl" type="hidden" value="<?= BASEURL ?>">
<script src="<?= BASEURL ?>/public/js/curtida.js"></script>
</section>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
