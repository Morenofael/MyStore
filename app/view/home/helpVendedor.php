<?php
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
        <h3>Ajuda para o vendedor</h3>
    </div>
</div>

<script src="<?= BASEURL ?>/public/js/home.js"></script>
<?php require_once __DIR__ . "/../include/footer.php";
?>
