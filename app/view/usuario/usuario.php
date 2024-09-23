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
           <h4>Data de Nascimento: <?= $usuario->getData_nascimento()?></h4>
        </div>

    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary"
                href="<?= BASEURL ?>/../">Voltar</a>
        <!--
        <?php if($brecho->getId_usuario() == $_SESSION[SESSAO_USUARIO_ID]):?>
        <a class="btn btn-success"
                href="<?= BASEURL ?>/controller/BrechoController.php?action=edit&id=<?=$brecho->getId()?>">Editar</a>
        <a class="btn btn-primary"
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=create">Adicionar produto</a>
        <?php endif;?>
        <ul>
            <?php foreach($produtos as $p): ?>
                <li>
                    <a href="<?=BASEURL?>/controller/ProdutoController.php?action=display&id=<?=$p->getId()?>">
                        <?=$p->getNome()?>
                    </a>
                </li> 
            <?php endforeach; ?>
        </ul>
            -->
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
