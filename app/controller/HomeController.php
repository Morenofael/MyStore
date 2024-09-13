<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/BrechoDAO.php");

class HomeController extends Controller {

    private UsuarioDAO $usuarioDao;
    private BrechoDAO $brechoDao;

    public function __construct() {
        //Testar se o usuário está logado
        if(! $this->usuarioLogado()) {
            exit;
        }

        //Criar o objeto do UsuarioDAO
        $this->usuarioDao = new UsuarioDAO();
        $this->brechoDao = new BrechoDAO();

        $this->handleAction();       
    }

    protected function home() {
        $listaBrecho = $this->brechoDao->list();    

        $dados["listaBrechos"] = $listaBrecho;

        //echo "<pre>" . print_r($dados, true) . "</pre>";
        $this->loadView("home/home.php", $dados);
    }

}

//Criar o objeto da classe HomeController
new HomeController();
