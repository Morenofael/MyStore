<!-- Footer -->
<footer class="text-center text-lg-start text-muted" style="margin-top: 10px;">
<link rel="stylesheet" href="<?=BASEURL?>/public/css/menu.css" media="all">
    <div class="footer-categorias-wrapper">
        <ul>
            <li><h5>MS</h5></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByGenero&g=m">Roupas masculinas</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByGenero&g=f">Roupas femininas</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByGenero&g=u">Roupas Unissex</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByGenero&g=i">Roupas Infantis</a></li>
        </ul>
        <ul>
            <li><h5>Marcas</h5></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=nike">Nike</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=adidas">Adidas</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=under-armour">Under Armour</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=mizuno">Mizuno</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=lupo">Lupo</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=anta">Anta</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=jordan">Jordan</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=asics">Asics</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=new-balance">New Balance</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=fila">Fila</a></li>
            <li><a href="<?=BASEURL?>/controller/ProdutoController.php?action=listByTags&q=olympikus">Olympikus</a></li>
        </ul>
        <ul>
            <li><h5>Utilidades</h5></li>
            <li><a href="<?=BASEURL?>/controller/HomeController.php?action=help">Ajuda</a></li>
            <li><a href="<?=BASEURL?>/controller/HomeController.php?action=helpVendedor">Como vender</a></li>
            <li><a href="<?=BASEURL?>/controller/HomeController.php?action=helpComprador">Como comprar</a></li>
            <li><a href="<?=BASEURL?>/controller/HomeController.php?action=termosDeUso">Termos de uso</a></li>
        </ul>
        <ul>
            <li><h5>Minha conta</h5></li>
            <li><a href="<?=BASEURL?>/controller/BrechoController.php?action=create">Minha loja</a></li>
            <li><a href="<?=BASEURL?>/controller/PedidoController.php?action=listForVendedor">Minhas vendas</a></li>
            <li><a href="<?=BASEURL?>/controller/PedidoController.php?action=listForComprador">Minhas compras</a></li>
            <li><a href="">Configurações</a></li>
        </ul>
    </div>
</footer>

<!-- BOOTSTRAP: scripts requeridos pelo framework -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Fecha as tags BODY e HTML -->
</body>
</html>
