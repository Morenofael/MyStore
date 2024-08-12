<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Usuário
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="col-6">
            <form id="frmUsuario" method="POST" 
                action="<?= BASEURL ?>/controller/UsuarioController.php?action=save" >
                <div class="form-group">
                    <label for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome" 
                        maxlength="70" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["usuario"]) ? $dados["usuario"]->getNome() : ''); ?>" />
                </div>
                
                <div class="form-group">
                    <label for="txtEmail">Email:</label>
                    <input class="form-control" type="email" id="txtEmail" name="email" 
                        maxlength="345" placeholder="Informe o email"
                        value="<?php echo (isset($dados["usuario"]) ? $dados["usuario"]->getEmail() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtSenha">Senha:</label>
                    <input class="form-control" type="password" id="txtPassword" name="senha" 
                        maxlength="15" placeholder="Informe a senha"
                        value="<?php echo (isset($dados["usuario"]) ? $dados["usuario"]->getSenha() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtConfSenha">Confirmação da senha:</label>
                    <input class="form-control" type="password" id="txtConfSenha" name="conf_senha" 
                        maxlength="15" placeholder="Informe a confirmação da senha"
                        value="<?php echo isset($dados['confSenha']) ? $dados['confSenha'] : '';?>"/>
                </div>
                
                <div class="form-group">
                    <label for="txtCpf">CPF:</label>
                    <input class="form-control" type="text" id="txtCPF" name="cpf" 
                        maxlength="15" placeholder="Informe o CPF"
                        value="<?php echo isset($dados['usuario']) ? $dados['usuario']->getCpf() : '';?>"/>
                </div>

                <div class="form-group">
                    <label for="txtTelefone">Telefone:</label>
                    <input class="form-control" type="text" id="txtTelefone" name="telefone" 
                        maxlength="15" placeholder="Informe o telefone"
                        value="<?php echo isset($dados['usuario']) ? $dados['usuario']->getTelefone() : '';?>"/>
                </div>

                <div class="form-group">
                    <label for="dateNascimento">Data de Nascimento:</label>
                    <input class="form-control" type="date" id="dateNascimento" name="data_nascimento" 
                        value="<?php echo isset($dados['usuario']) ? $dados['usuario']->getDataNascimento() : '';?>"/>
                </div>

                <input type="hidden" id="hddId" name="id" 
                    value="<?= $dados['id']; ?>" />

                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/UsuarioController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
