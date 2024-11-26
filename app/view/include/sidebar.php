<link rel="stylesheet" href="<?=BASEURL?>/public/css/sidebar.css" media="all">
<div class="sidebar">
    <ul class="no-decoration">
        <li id="sidebar-untogler" onclick="untogleSidebar()"><img src="<?= BASEURL ?>/view/img/svg/x.svg" alt="Fechar" class="icon">Fechar</li>
        <li><img src="<?= BASEURL ?>/view/img/svg/home.svg" alt="Home" class="icon"><a href="<?= HOME_PAGE ?>">Home</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/bussola.svg" alt="Bússola" class="icon"><a href="<?=BASEURL?>/controller/ProdutoController.php?action=list">Explorar</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/coracao.svg" alt="Coração" class="icon"><a href="<?= BASEURL ?>/controller/CurtidaController.php?action=list">Curtido</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/carrinho.svg" alt="Carrinho" class="icon"><a href="<?=BASEURL?>/controller/PedidoController.php?action=listForComprador">Meus pedidos</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/porquinho.svg" alt="Cofre de porquinho" class="icon"><a href="<?= BASEURL ?>/controller/PedidoController.php?action=listForVendedor">Vendendo</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/perfil.svg" alt="Perfil" class="icon"><a href="<?= BASEURL ?>/controller/UsuarioController.php?action=display&id=<?= $_SESSION[SESSAO_USUARIO_ID] ?>">Perfil</a></li>
        <li><img src="<?= BASEURL ?>/view/img/svg/engrenagem.svg" alt="Engrenagem" class="icon"><a href="">Configurações</a></li>
    </ul>
    <a href="<?=BASEURL?>/controller/BrechoController.php?action=create">
        <div id="venda-conosco">
            <h4>Venda conosco</h4>
            <p>Mussum Ipsum, cacilds vidis litro abertis.  Ainda é segunda-feris e já tô sem paciêncis!</p>
        </div>
    </a>
</div>
