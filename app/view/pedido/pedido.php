<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$pedido = $dados["pedido"];
$imagens = $dados["imagem"];
echo "<pre>";
print_r($pedido);
echo "</pre>";
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/pedido.css" media="all">
<section class="main">
        <div class="esquerda">
            <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[0]->getArquivoNome()?>" alt="">
            <h3><?=$pedido->getProduto()->getNome()?></h3>
            <h4><?= $pedido->getProduto()->getDescricao()?></h4>
            <h4><?= $pedido->getProduto()->getPrecoReais()?></h4> 
            <h4>Gênero:<?= $dados["generoString"]?></h4> 
        </div>
        <div class="direita">
            <div id="comprovante-container">
                <label for="selEndereco">Slecione o endereço de entrega:</label>
                <select id="selEndereco" name="endereco">
                    <option value="">Selecione</option>
                    <?php foreach($dados["enderecosComprador"] as $en): ?>
                    <option value="<?=$en->getId()?>"><?=$en->getCep() . ", " . $en->getLogradouro() . ", " . $en->getNumero()?></option>
                    <?php endforeach; ?>
                </select>
                <button onclick="salvarEndereco()">salvar</button>
               <br>
        
                <label for="fileComprovante">Insira o comprovante PIX:</label>
                <input type="file" id="fileComprovante">
            </div>
        </div>
    </div>
</section>
<input type="hidden" value="<?=$pedido->getId()?>" id="pedidoId">
<input type="hidden" value="<?=BASEURL?>" id="ipnBaseUrl">
<script src="<?=BASEURL?>/public/js/pedido.js"></script>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
