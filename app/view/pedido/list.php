<?php
#Nome do arquivo: endereco/list.php
#Objetivo: interface para listagem de endereços do usuário

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/lista.css" media="all">
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
    <div class="main-content">

    <h3 class="text-center">Pedidos</h3>
        <div class="row" style="margin-top: 10px;">
            <div class="col-12">
                <table id="tabProdutos" class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dados['lista'] as $p): ?>
                            <tr>
                                <td><a href="<?=BASEURL?>/controller/PedidoController.php?action=display&id=<?=$p->getId()?>"><?= $p->getProduto()->getNome(); ?></a></td>
                                <td><?= $p->getProduto()->getDescricao(); ?></td>
                                <td><?= $p->getPrecoReais(); ?></td>
                                <td><?= $p->getStatusTexto(); ?></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
