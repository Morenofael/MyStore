<?php
#Nome do arquivo: denuncia/denuncia.php
#Objetivo: interface para vizualização de denuncias; 

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$denuncia = $dados["denuncia"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/denuncia.css">
<h3>Denuncia</h3>
<div class="main">
    <div class="img-wrapper">
        <img src="<?=PATH_ARQUIVOS?>/<?=$denuncia->getCaminhoImagem()?>" alt="Imagem da denuncia">
    </div>
    <div class="info-wrapper">
        <div class="info">
            <h4>Queixa:</h4>
            <span><?=$denuncia->getTexto()?></span>
            <h4>Pedido:</h4>
            <span><a href="<?=BASEURL?>/controller/PedidoController.php?action=display&id=<?= $denuncia->getPedido()->getId()?>"><?= $denuncia->getPedido()->getProduto()->getNome()?></a></span>
            <h4>Comprador:</h4>
           <a href="<?=BASEURL?>/controller/UsuarioController.php?action=display&id=<?= $denuncia->getPedido()->getComprador()->getId()?>"><?= $denuncia->getPedido()->getComprador()->getNome()?></a>
            <h4>Vendedor:</h4>
            <a href="<?=BASEURL?>/controller/UsuarioController.php?action=display&id=<?= $denuncia->getPedido()->getVendedor()->getId()?>"><?= $denuncia->getPedido()->getVendedor()->getNome()?></a>
        </div>
        <div class="info">
            <label for="selStatusDenuncia">Status da Denuncia:</label>
            <select name="statusDenuncia" id="selStatusDenuncia">
                <option value="NV"<?php if($denuncia->getStatus() == "NV") echo 'selected'?>>Não vista</option>
                <option value="INPRO"<?php if($denuncia->getStatus() == "INPRO") echo 'selected'?>>Improcedente</option>
                <option value="PRO"<?php if($denuncia->getStatus() == "PRO") echo 'selected'?>>Procedente</option>
            </select>
        </div>
    </div>
</div>
<input type="hidden" id="ipnBaseUrl" value="<?=BASEURL?>">
<input type="hidden" id="hddIdDenuncia" value="<?=$denuncia->getId()?>">
<script src="<?=BASEURL?>/public/js/denuncia.js"></script>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
