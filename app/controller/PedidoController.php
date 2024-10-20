<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PedidoDAO.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/BrechoDAO.php");
require_once(__DIR__ . "/../model/Pedido.php");

class PedidoController extends Controller {

    private PedidoDAO $pedidoDao;
    private ProdutoDAO $produtoDao;
    private UsuarioDAO $usuarioDao;
    private BrechoDAO $brechoDao;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        $this->pedidoDao = new PedidoDAO();
        $this->produtoDao = new ProdutoDAO();
        $this->usuarioDao = new UsuarioDAO();
        $this->brechoDao = new BrechoDAO();

        $this->handleAction();
    }
    
    protected function display(){
        $id = $_GET['id'];
        $dados["pedido"] = $this->pedidoDao->findById($id);
        $this->loadView("pedido/pedido.php", $dados);
}

    protected function save() {
        $idProduto = $_GET['id'];
        $produto = $this->produtoDao->findById($idProduto);
        $brecho = $this->brechoDao->findById($produto->getIdBrecho());
        //Cria objeto Pedido 
        $pedido = new Pedido();
        $pedido->setIdVendedor($brecho->getUsuario()->getId());
        $pedido->setIdComprador($_SESSION[SESSAO_USUARIO_ID]);
        $pedido->setIdProduto($produto->getId());
        $pedido->setPreco($produto->getPreco());
        
        $this->pedidoDao->insert($pedido);
        $pedidoId = $this->pedidoDao->findLastPedidoFromUser($_SESSION[SESSAO_USUARIO_ID])->getId(); 
        header("location: ./PedidoController.php?action=display&id=" . $pedidoId);
        }
}


#Criar objeto da classe para assim executar o construtor
new PedidoController();
