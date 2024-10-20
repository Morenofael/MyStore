<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PedidoDAO.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../model/Pedido.php");

class PedidoController extends Controller {

    private PedidoDAO $pedidoDao;
    private ProdutoDAO $produtoDao;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        $this->pedidoDao = new PedidoDAO();
        $this->produtoDao = new ProdutoDAO();

        $this->handleAction();
    }
    
/*    protected function display(){
        //DAR id depois do edit
        $id = $_GET['id'];
        $dados["brecho"] = $this->brechoDao->findById($id);
        $dados["produtos"] = $this->produtoDao->listByBrecho($dados["brecho"]->getId());
        $this->loadView("brecho/brecho.php", $dados);
}*/

    protected function save() {
        $idProduto = $_GET['id'];
        $produto = $this->produtoDao->findById($idProduto);
        //Cria objeto Pedido 
        $pedido = new Pedido();
        $pedido->setIdVendedor($produto->getId_usuario);
        $pedido->setIdComprador($_SESSION['SESSAO_USUARIO_ID']);
        $pedido->setIdProduto($produto->getId());
        $pedido->setPreco($produto->getPreco());
        
        $this->pedidoDao->insert($pedido);
        header("location: ./HomeController.php?action=home");
        }
}


#Criar objeto da classe para assim executar o construtor
new PedidoController();
