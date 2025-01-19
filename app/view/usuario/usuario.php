<?php
#Nome do arquivo: usuario/usuario.php
#Objetivo: interface para vizualização de usuarios; 

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$usuario = $dados["usuario"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/usuario.css" media="all">
<div class="cards-wrapper">
    <div id="card-usuario">
        <h3>Usuário</h3>
        <a href="<?= BASEURL ?>/controller/UsuarioController.php?action=insertAlterPfp">
            <?php if($usuario->getFotoPerfil()): ?>
            <img src="<?= PATH_ARQUIVOS . $usuario->getFotoPerfil()?>" alt="Foto de perfil" class="img-fluid foto-perfil">
            <?php else: ?>
            <img src="<?= BASEURL?>/view/img/svg/perfil2.svg" alt="Foto de perfil" class="img-fluid foto-perfil">
            <?php endif; ?>
        </a>
        <h4>Nome: <?= $usuario->getNome()?></h4>
        <a class="btn botao"
            href="<?= BASEURL ?>/controller/UsuarioController.php?action=editSenha&id=<?=$_SESSION[SESSAO_USUARIO_ID]?>">Alterar Senha</a>
    </div>
    <?php if($usuario->getId() == $_SESSION[SESSAO_USUARIO_ID]): ?>
        <div class="card-def">
            <h3>Endereços</h3>
            <div class="flex">
                <a class="btn botao"
                    href="<?= BASEURL ?>/controller/EnderecoController.php?action=create">Adicionar endereço</a>
                <a class="btn botao"
                    href="<?= BASEURL ?>/controller/EnderecoController.php?action=list">Meus endereços</a>
            </div>
        </div>
    <?php endif; ?>        
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
