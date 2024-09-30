<?php
#Nome do arquivo: view/include/menu.php
#Objetivo: menu da aplicação para ser incluído em outras páginas

$nome = "(Sessão expirada)";
if(isset($_SESSION[SESSAO_USUARIO_NOME]))
    $nome = $_SESSION[SESSAO_USUARIO_NOME];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <span class="nav-link">MySports</span>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= HOME_PAGE ?>">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Masculino</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Feminino</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Infantil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Ofertas</a>
            </li>

        </ul>

        <ul class="navbar-nav mr-left">
            <li class="nav-item active m-2">
                <a class="" href="<?= LOGOUT_PAGE ?>">Sair</a>
            </li>
            <li class="nav-item active m-2">
                <?php if($_SESSION[SESSAO_USUARIO_ID]):?>
                <a href="<?=BASEURL?>/controller/UsuarioController.php?action=display&id=<?=$_SESSION[SESSAO_USUARIO_ID]?>"><?= $nome?></a>
                <?php endif;?>
            </li>
        </ul>
    </div>
</nav>
