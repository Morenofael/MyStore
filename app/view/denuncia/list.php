<?php
#Nome do arquivo: endereco/list.php
#Objetivo: interface para listagem de endereços do usuário

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Denuncias</h3>

<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabEnderecos" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Reclamação</th>
                        <th>Comprador</th>
                        <th>Vendedor</th>
                        <th>Procedência</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $d): ?>
                        <tr>
                            <td><a href="<?=BASEURL?>/controller/PedidoController.php?action=display&id=<?= $d->getPedido()->getId()?>"><?= $d->getPedido()->getProduto()->getNome()?></a></td>
                            <td><?= $d->getTexto()?></td>
                            <td><a href="<?=BASEURL?>/controller/UsuarioController.php?action=display&id=<?= $d->getPedido()->getComprador()->getId()?>"><?= $d->getPedido()->getComprador()->getNome()?></a></td>
                            <td><a href="<?=BASEURL?>/controller/UsuarioController.php?action=display&id=<?= $d->getPedido()->getVendedor()->getId()?>"><?= $d->getPedido()->getVendedor()->getNome()?></a></td>
                            <td><?=$d->getStatusTexto()?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
