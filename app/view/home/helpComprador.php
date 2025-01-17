<?php
#View para a home do sistema

require_once __DIR__ . "/../include/header.php";
require_once __DIR__ . "/../include/menu.php";
?>
<link rel="stylesheet" href="<?= BASEURL ?>/public/css/home.css">
<span id="sidebar-togler" onclick="togleSidebar()">☰</span>
<div class="main">
<?php require_once(__DIR__ . "/../include/sidebar.php") ?>
    <div class="main-content">
        <form id="frmSearch" action="./ProdutoController.php" method="GET">
            <input type="hidden" name="action" value="listByTags">
            <input type="text" name="q" id="txtQuery" placeholder="Pesquise produtos">
            <button type="submit"><img src="<?= BASEURL ?>/view/img/svg/bussola.svg" alt="Engrenagem" class="icon"></button>
        </form>
        <h3>Como comprar produtos no MySports</h3>
        <p>Para pesquisar um produto, pode ser utilizado o campo no canto superior direito da tela. Para vizualizar mais produtos, pode ser utilizada a opção "Explorar" no menu lateral.</p>
        <p>Ao vizualizar o produto, clique na opção "Comprar". Você será direcionado para a página do seu pedido.</p>
        <p>Selecione o endereço onde deseja receber o produto. Se o endereço desejado ainda não estiver cadastrado, cadastre-o no menu de usuário, e prossiga com o pedido na opção "Meus pedidos" do menu lateral.</p>
        <p>Pague o valor do produto via pix ou transferência bancária, e anexe o comprovante no campo adequado.</p>
        <p>Aguarde para que o vendedor atualize o status do produto.</p>
        <p>Ao receber o produto, clique em "Confirmar recebimento" para encerrar o pedido. O histórico continuará salvo em "Meus pedidos"</p>
    </div>
</div>

<script src="<?= BASEURL ?>/public/js/home.js"></script>
<?php require_once __DIR__ . "/../include/footer.php";
?>
