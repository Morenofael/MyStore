<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$pedido = $dados["pedido"];
$imagens = $dados["imagem"];
echo "<pre>";
print_r($pedido);
echo "</pre>";
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/pedido.css" media="all">
<section class="main">
        <div class="esquerda">
            <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[0]->getArquivoNome()?>" alt="">
            <h3><?=$pedido->getProduto()->getNome()?></h3>
            <h4><?= $pedido->getProduto()->getDescricao()?></h4>
           <h4>R$<?= $pedido->getProduto()->getPreco()?></h4> 
           <h4>Gênero:<?= $dados["generoString"]?></h4> 
        </div>
        <div class="direita">
            <div id="comprovante-container">
                <label for="fileComprovante">Insira o comprovante PIX:</label>
                <input type="file" id="fileComprovante">
            </div>
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
</section>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
