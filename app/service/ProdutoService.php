<?php
    
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class ProdutoService{
    private UsuarioDAO $usuarioDao;

    public function __construct(){
        $this->usuarioDao = new UsuarioDAO();
    }

    /* Método para validar os dados do usuário que vem do formulário */
    public function validarDados(Produto $produto) {
        $erros = array();

        //Validar campos vazios
        if(! $produto->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $produto->getDescricao())
            array_push($erros, "O campo [Descrição] é obrigatório.");

        if(! $produto->getPreco())
            array_push($erros, "O campo [Email] é obrigatório.");
        
        return $erros;
        
    }

    public function getUsuarioProduto(Produto $produto){
        $usuario = $this->usuarioDao->findByBrecho($produto->getIdBrecho());
    }

}
