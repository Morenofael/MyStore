<?php
#Nome do arquivo: brecho/brecho.php
#Objetivo: interface para vizualização de brechós

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$usuario = $dados["usuario"];
?>
<h3 class="text-center">
    USUÁRIO
</h3>
<div class="container">

    <div class="row" style="margin-top: 10px;">

        <div class="col-6">
           <h4>Nome: <?= $usuario->getNome()?></h4>
           <h4>Email: <?= $usuario->getEmail()?></h4>
           <h4>CPF: <?= $usuario->getCpf()?></h4>
           <h4>Telefone: <?= $usuario->getTelefone()?></h4>
           <h4>Data de Nascimento: <?= $usuario->getDataNascimento()?></h4>
        </div>

    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
