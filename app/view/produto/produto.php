<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$produto = $dados["produto"];
$vendedor = $dados["vendedor"];
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
        <?php if($vendedor->getId() == $_SESSION[SESSAO_USUARIO_ID]):?>
        <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=edit&id=<?=$produto->getId()?>">Editar</a>
        <a class="btn btn-danger" onclick="confirm('deseja excluir?')"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=delete&id=<?=$produto->getId()?>">Excluir</a>
        <?php endif;?>
        
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
