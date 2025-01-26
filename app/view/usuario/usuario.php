<?php
#Nome do arquivo: usuario/usuario.php
#Objetivo: interface para vizualização de usuarios; 

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
$usuario = $dados["usuario"];
echo "<pre>";
print_r($usuario);
echo "</pre>";
?>
<link rel="stylesheet" href="<?=BASEURL?>/public/css/usuario.css" media="all">
<div class="cards-wrapper">
    <div id="card-usuario">
        <h3>Usuário</h3>
        <label for="filePfp">
        <div>
            <?php if($usuario->getFotoPerfil()): ?>
            <img src="<?= PATH_ARQUIVOS . $usuario->getFotoPerfil()?>" alt="Foto de perfil" class="img-fluid foto-perfil">
            <?php else: ?>
            <img src="<?= BASEURL?>/view/img/svg/perfil2.svg" alt="Foto de perfil" class="img-fluid foto-perfil">
            <?php endif; ?>
        </div>
        </label>
        <input type="file" id="filePfp">
        <h4>Nome: <?= $usuario->getNome()?></h4>
        <?php if($usuario->getId() == $_SESSION[SESSAO_USUARIO_ID]): ?>
        <a class="btn botao"
            href="<?= BASEURL ?>/controller/UsuarioController.php?action=editSenha&id=<?=$_SESSION[SESSAO_USUARIO_ID]?>">Alterar Senha</a>
        <?php endif; ?>
        <?php if($_SESSION[SESSAO_USUARIO_PAPEL] == 1): ?>
            <label for="selSituacao">Situação:</label>
            <select id="selSituacao" name="situacao">
                <option value="1" <?php if($usuario->getSituacao == 1) echo "selected" ?>>Ativo</option>
                <option value="0" <?php if($usuario->getSituacao == 0) echo "selected" ?>>Inativo</option>
            </select>   
        <?php endif; ?>
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
            <table id="tabEnderecos" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Endereço</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['enderecos'] as $en): ?>
                        <tr>
                            <td><?= $en; ?></td>
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/EnderecoController.php?action=edit&id=<?= $en->getId() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão do endereço?');"
                                href="<?= BASEURL ?>/controller/EnderecoController.php?action=delete&id=<?= $en->getId() ?>">
                                Excluir</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>        
</div>
<input type="hidden" value="/app" id="ipnBaseUrl">
<input type="hidden" value="<?=$usuario->getId()?>" id="ipnIdUsuario">
<script src="<?=BASEURL?>/public/js/usuario.js"></script>
<?php
require_once(__DIR__ . "/../include/footer.php");
?>
