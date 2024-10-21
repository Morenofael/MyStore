<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/BrechoDAO.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");

class HomeController extends Controller {

    private BrechoDAO $brechoDao;
    private ProdutoDAO $produtoDao;

    public function __construct() {
        //Testar se o usuário está logado
        if(! $this->usuarioLogado()) {
            exit;
        }

        //Criar o objeto do UsuarioDAO
        $this->brechoDao = new BrechoDAO();
        $this->produtoDao = new ProdutoDAO();

        $this->handleAction();       
    }

    protected function home() {
        $listaBrecho = $this->brechoDao->list();    
        $produtos = $this->produtoDao->list();

        $dados["listaBrechos"] = $listaBrecho;
        $dados["produtos"] = $produtos;

        //echo "<pre>" . print_r($dados, true) . "</pre>";
        $this->loadView("home/home.php", $dados);
    }

}

//Criar o objeto da classe HomeController
new HomeController();
