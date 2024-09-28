<?php
#View para a home do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<link rel="stylesheet" href="<?= BASEURL ?>/public/css/home.css">

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

<script src="<?= BASEURL ?>/public/js/home.js"></script>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
