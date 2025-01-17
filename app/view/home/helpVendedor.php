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
        <h3>Como vender produtos do MySports</h3>
        <p>O MySports é uma plataforma de intermediação de vendas de produtos esportivos, e pode ser usada para vender tanto produtos novos quanto produtos usados, desde que estejam em condições boas para uso.</p>
        <h3>Meu brechó</h3>
        <p>Todo produto vendido é associado a um brechó. Caso ainda não possua um brechó cadastrado no MySports, basta clicar em "Meu Brechó" no canto superior direito da tela.</p>
        <p>Se certifique de que todas as informações estão corretas entes de vender. Qualquer erro pode ser corrigido clicando em "editar" na página de seu brechó.</p>
        <h3>Meus produtos</h3>
        <p>Para vender um produto, clique em "Adicionar Produto" dentro da página do seu brechó. Como o MySports é destinado, principalmente, para a venda de produtos usados, o produto adicionado será considerado indisponível após ter um pedido realizado. Portanto, no caso de haverem multiplos produtos, estes devem ser adicionados separadamente.</p>
        <h5>Adicionando o produto</h5>
        <p>Use um nome descritivo para seu produto. Por exemplo, caso esteja vendendo um tênis de preto de corrida da marca Ascics, um bom nome seria "Tênis Ascics preto corrida".</p>
        <p>Na descrição do produto, inclua <em>qualquer</em> informação relevante sobre o mesmo. Isso inclui por quanto tempo ele foi usado, qualquer defeito de fabricação ou que tenha sido adquirido com uso. Tembém inclui cor, tamanho, marca, e qualque informação que um consumidor toma em consideração antes de fazer uma compra.</p>
        <p>Se certifique de que o preço (em Reais) está correto</p>
        <p>Caso não tenha certeza sobre o gênero do produto, assinale a opção unissex</p>
        <p>Inclua pelo menos uma, e até três imagens do produto.</p>
        <p>Ao adicionar as tags, inclua qualquer palavra que um comprador pesquisaria para procurar o produto. No caso de uma bola da basquete tamanho 7 da Adidas, boas tags seriam "bola basquete tamanho size 7 adidas"</p>
    </div>
</div>

<script src="<?= BASEURL ?>/public/js/home.js"></script>
<?php require_once __DIR__ . "/../include/footer.php";
?>
