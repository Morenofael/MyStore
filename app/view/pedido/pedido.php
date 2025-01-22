<?php
#Nome do arquivo: produto/produto.php
#Objetivo: interface para vizualização de produtos

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$pedido = $dados["pedido"];
$imagens = $dados["imagem"];
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/pedido.css" media="all">
<section class="main">
    <div class="esquerda">
        <img src="<?=BASEURL?>/view/img/upl_img/<?=$imagens[0]->getArquivoNome()?>" id="main-img" alt="">
        <h3><?=$pedido->getProduto()->getNome()?></h3>
        <h4><?= $pedido->getProduto()->getDescricao()?></h4>
        <h4><?= $pedido->getProduto()->getPrecoReais()?></h4>
        <h4>Gênero:<?= $dados["generoString"]?></h4>
        <h4>Chave pix para pagamento:<?=$pedido->getProduto()->getBrecho()->getChavePix() ?></h4>
        <h4>Loja: <?=$pedido->getProduto()->getBrecho()->getNome()?></h4>
    </div>
    <div class="direita">
        <?php if($pedido && $pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID]):?>
        <div id="comprovante-container">
            <label for="selEndereco">Selecione o endereço de entrega:</label>
            <select id="selEndereco" name="endereco">
                <option value="">Selecione</option>
                <?php foreach($dados["enderecosComprador"] as $en): ?>
                <option value="<?=$en->getId()?>"
                    <?php if($pedido && $pedido->getIdEnderecoEntrega() && $pedido->getIdEnderecoEntrega() == $en->getId()):
                    ?>
                    selected
                    <?php endif; ?>
                        ><?=$en->getCep() . ", " . $en->getLogradouro() . ", " . $en->getNumero()?></option>
                    <?php endforeach; ?>
            </select>
            <button onclick="if(confirm('Tem certeza que deseja salver este endereço?'))salvarEndereco()" id="btnSalvarEndereco" class="btn">salvar</button>
            <span>Caso o endereço não esteja registrado, <a href="<?=BASEURL?>/controller/EnderecoController.php?action=create">clique aqui</a>.</span>
            <br>

            <label for="fileComprovante" class="custom-file-upload">Comprovante PIX</label>
            <input name="file[]" type="file" id="fileComprovante"  disabled>
            <button onclick="if(confirm('Tem certeza que deseja salver este comprovante?'))salvarComprovante()" id="btnSalvarComprovante" class="btn" disabled>salvar</button>
        </div>
        <?php endif;?>
            <div id="status-display">
                <span>Status do pedido: <?=$pedido->getStatusTexto()?></span>
            </div>
            <?php if($pedido->getIdEnderecoEntrega()) : ?>
                <span>Endereço de entrega: <?=$dados["enderecoEntrega"]?></span><br>
            <?php endif;?>
            <?php if($pedido && $pedido->getVendedor()->getId() == $_SESSION[SESSAO_USUARIO_ID] && $pedido->getStatus() != 'AI' && $pedido->getStatus() != "ENT"):?>
                <select id="selStatus">
                    <option value="">Altere o status do pedido</option>
                    <option value="P">Em preparo</option>
                    <option value="ENV">Enviado para entrega</option>
                </select>
                <button onclick="if(confirm('Tem certeza que deseja alterar o status?'))alterarStatusPedido(document.getElementById('selStatus').value)" id="btnSalvarComprovante">salvar</button>
            <?php endif;?>
            <?php if($pedido && $pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID] && $pedido->getStatus() == 'ENV' && $pedido->getStatus() != 'ENT'):?>
                <button class="btn botao" onclick="if(confirm('Tem certeza que deseja confirmar o recebimento?'))alterarStatusPedido('ENT')">Confirmar recebimento</button>
            <?php endif;?>
            <?php if($pedido && $pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID] && $pedido->getStatus() == 'ENT'):?>
                <a href="<?=BASEURL?>/controller/DenunciaController.php?action=create&idPedido=<?=$pedido->getId()?>" class="btn btn-outline-danger" onclick="if(confirm('Tem certeza que deseja denunciar o produto?'))">Denunciar</a>
            <?php endif;?>
            <?php if($pedido && $pedido->getCaminhoComprovante()):?>
                <div>
                    <span>Comprovante PIX:</span><br>
                    <img src="<?=BASEURL?>/view/img/upl_img/<?=$pedido->getCaminhoComprovante()?>" id="img-comprovante-pix" alt="">
                </div>
            <?php endif;?>
        </div>
</section>
<input type="hidden" value="<?=$pedido->getId()?>" id="pedidoId">
<input type="hidden" value="<?=$pedido->getStatus()?>" id="pedidoStatus">
<input type="hidden" value="<?=$pedido->getIdEnderecoEntrega()?>" id="idEnderecoEntrega">
<input type="hidden" value="<?=$pedido->getCaminhoComprovante()?>" id="caminhoComprovante">
<input type="hidden" value="<?=BASEURL?>" id="ipnBaseUrl">
<script src="<?=BASEURL?>/public/js/pedido.js"></script>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
