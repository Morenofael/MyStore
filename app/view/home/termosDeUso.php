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
        <h3>Termos de uso</h3>
        <ol>
            <li>Não pode vneder pod</li>
            <li>Ñ pode vender diamba (makonha )vencida</li>
            <li>Os originais do samba sao mt bons pprt</li>
            <li>Programar ouvinfo samba é uma vibe</li>
            <li>Se tiver dificil de mnadar pix da pra mandar umas latas de heinekcen no lugar do dinheiro</li>
            <li>proibido vender roupa original 🏴‍☠️🏴‍☠️🏴‍☠️</li>
            <li>proibido dar dinheiro pra netflix 🏴‍☠️🏴‍☠️🏴‍☠️</li>
       </ol>
    </div>
</div>

<script src="<?= BASEURL ?>/public/js/home.js"></script>
<?php require_once __DIR__ . "/../include/footer.php";
?>
