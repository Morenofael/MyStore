<?php
#View para a home do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<link rel="stylesheet" href="<?= BASEURL ?>/public/css/home.css">
<div class="main">
    <div class="sidebar">
        <ul class="no-decoration">
            <li><img src="<?=BASEURL?>/view/img/svg/home.svg" alt="Home" class="icon"><a href="">Home</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/bussola.svg" alt="Bússola" class="icon"><a href="">Explorar</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/coracao.svg" alt="Coração" class="icon"><a href="">Curtido</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/carrinho.svg" alt="Carrinho" class="icon"><a href="">Meu carrinho</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/porquinho.svg" alt="Cofre de porquinho" class="icon"><a href="">Vendendo</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/perfil.svg" alt="Perfil" class="icon"><a href="">Perfil</a></li>
            <li><img src="<?=BASEURL?>/view/img/svg/engrenagem.svg" alt="Engrenagem" class="icon"><a href="">Configurações</a></li>
        </ul>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-3 text-center">
            <span class="fonte-grande">Brechos: </span>

            <ul>
                <?php 
                    foreach($dados["listaBrechos"] as $b) {
                        echo "<li>". "<a href='" . BASEURL . "/controller/BrechoController.php?action=display&id=" . $b->getId() . "'>" . $b->getNome() . "</a>" . "</li>";
                    }
                ?>
            </ul>

            <a href="#" class="btn btn-info" 
            onclick="usuarios();">Chamada AJAX</a>
            <a href="<?= BASEURL?>/controller/BrechoController.php?action=create" class="btn btn-success" 
            >Criar brecho</a>
        </div>

    </div>
</div>
<script src="<?= BASEURL ?>/public/js/home.js"></script>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
