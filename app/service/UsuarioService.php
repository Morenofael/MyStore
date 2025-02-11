<?php
    
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class UsuarioService {
    private UsuarioDAO $usuarioDao;

    public function __construct(){
        $this->usuarioDao = new UsuarioDAO();
    }

    /* Método para validar os dados do usuário que vem do formulário */
    public function validarDados(Usuario $usuario, ?string $confSenha) {
        $erros = array();

        //Validar campos vazios
        if(! $usuario->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $usuario->getSenha())
            array_push($erros, "O campo [Senha] é obrigatório.");

        if(! $confSenha)
            array_push($erros, "O campo [Confirmação da senha] é obrigatório.");
            
        if(! $usuario->getEmail())
            array_push($erros, "O campo [Email] é obrigatório.");
        //Validar se email já foi registrado
        else if($this->usuarioDao->findByEmail($usuario->getEmail()) != null)
            array_push($erros, "O campo [Email] já foi registrado para outro usuário.");
            
        if(! $usuario->getCpf())
            array_push($erros, "O campo [CPF] é obrigatório.");
            
        if(! $usuario->getTelefone())
            array_push($erros, "O campo [telefone] é obrigatório.");
            
        if(! $usuario->getDataNascimento())
            array_push($erros, "O campo [data de nascimento] é obrigatório.");
                
        //Validar se a senha é igual a contra senha
        if($usuario->getSenha() && $confSenha && $usuario->getSenha() != $confSenha)
            array_push($erros, "O campo [Senha] deve ser igual ao [Confirmação da senha].");

        //Validar maioridade
        $dataNascimento = new DateTime($usuario->getDataNascimento());
        $dataHoje = new DateTime(date("Y-m-d"));
        if($dataNascimento->diff($dataHoje)->days < 18*365)
            array_push($erros, "Você precisa ter mais de 18 anos para se cadastrar");

        return $erros;
        
    }
    
    public function validarMudancaSenha(Usuario $usuario, string $senha, string $confSenha){
        $erros = array();
         if($senha && $senha != $confSenha)
            array_push($erros, "O campo [Senha] deve ser igual ao [Confirmação da senha].");

         if(!$this->usuarioDao->findByLoginSenha($usuario->getLogin(), $usuario->getSenha())){ 
             array_push($erros, "Senha atual incorreta.");
         }
        return $erros;
    }
}
