<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PedidoDAO.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/BrechoDAO.php");
require_once(__DIR__ . "/../dao/ImagemDAO.php");
require_once(__DIR__ . "/../dao/EnderecoDAO.php");
require_once(__DIR__ . "/../model/Pedido.php");
require_once(__DIR__ . "/../model/Imagem.php");
require_once(__DIR__ . "/../service/ProdutoService.php");
require_once(__DIR__ . "/../service/ArquivoService.php");

class PedidoController extends Controller {

    private PedidoDAO $pedidoDao;
    private ProdutoDAO $produtoDao;
    private UsuarioDAO $usuarioDao;
    private BrechoDAO $brechoDao;
    private ImagemDAO $imagemDao;
    private EnderecoDAO $enderecoDao;
    private ProdutoService $prodService;
    private ArquivoService $arquivoService;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        $this->pedidoDao = new PedidoDAO();
        $this->produtoDao = new ProdutoDAO();
        $this->usuarioDao = new UsuarioDAO();
        $this->brechoDao = new BrechoDAO();
        $this->imagemDao = new ImagemDAO();
        $this->enderecoDao = new EnderecoDAO();
        $this->prodService = new ProdutoService();
        $this->arquivoService = new ArquivoService();


        $this->handleAction();
    }

    protected function listForComprador(string $msgErro = "", string $msgSucesso = "") {
        $pedidos= $this->pedidoDao->listFromComprador();
        $dados["lista"] = $pedidos;

        $this->loadView("pedido/list.php", $dados, $msgErro, $msgSucesso);
    }

    protected function listForVendedor(string $msgErro = "", string $msgSucesso = "") {
        $pedidos= $this->pedidoDao->listFromVendedor();
        $dados["lista"] = $pedidos;

        $this->loadView("pedido/list.php", $dados, $msgErro, $msgSucesso);
    }

    protected function display(){
        $id = $_GET['id'];
        $dados["pedido"] = $this->pedidoDao->findById($id);
        $dados["imagem"] = $this->imagemDao->findOneImageFromProduto($dados["pedido"]->getProduto()->getId());
        $dados["generoString"] = $this->prodService->generoCharToString($dados["pedido"]->getProduto()->getGenero());
        $dados["enderecosComprador"] = $this->enderecoDao->findByIdUsuario($dados["pedido"]->getComprador()->getId());
        if($dados["pedido"]->getIdEnderecoEntrega())
            $dados["enderecoEntrega"] = $this->enderecoDao->findById($dados["pedido"]->getIdEnderecoEntrega());
        $this->loadView("pedido/pedido.php", $dados);
}

    protected function save() {
        $idProduto = $_GET['id'];
        $produto = $this->produtoDao->findById($idProduto);
        $brecho = $this->brechoDao->findById($produto->getBrecho()->getId());
        
        //Cria objeto Pedido
        $pedido = new Pedido();
        $pedido->setVendedor($brecho->getUsuario());
        $pedido->setComprador($this->usuarioDao->findById($_SESSION[SESSAO_USUARIO_ID]));
        $pedido->setProduto($produto);
        $pedido->setPreco($produto->getPreco());

        if($pedido->getComprador()->getId() == $pedido->getVendedor()->getId()){
            echo "Você não pode comprar seu próprio produto.";
            exit;
        }else{
            $this->produtoDao->updateDisp($produto, 0); //Torna produto indisponível
            $this->pedidoDao->insert($pedido);
            $pedidoId = $this->pedidoDao->findLastPedidoFromUser($_SESSION[SESSAO_USUARIO_ID])->getId();
            header("location: ./PedidoController.php?action=display&id=" . $pedidoId);
        }
    }

    protected function updateIdEndereco(){
        $idEndereco = $_POST['idEndereco'];
        $idPedido = $_POST['idPedido'];
        $pedido = $this->pedidoDao->findById($idPedido);
        if($pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID])
        $this->pedidoDao->updateIdEndereco($idEndereco, $idPedido);
    }

    protected function updateCaminhoComprovante(){
        $file = $_FILES['file'];
        $idPedido = $_POST['idPedido'];

        $pedido = $this->pedidoDao->findById($idPedido);

        if($file && $pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID]){
            $arquivoNome = $this->arquivoService->salvarImagem($file, 0);
            $this->pedidoDao->updateCaminhoComprovante($arquivoNome, $idPedido);
        }

    }

    protected function  updateStatus(){
        $status = $_POST['status'];
        $idPedido = $_POST['idPedido'];

        $pedido = $this->pedidoDao->findById($idPedido);

        if($status && $pedido->getComprador()->getId() == $_SESSION[SESSAO_USUARIO_ID] or
        $pedido->getVendedor()->getId() == $_SESSION[SESSAO_USUARIO_ID]&& $pedido->getStatus() != "ENT"){
            $this->pedidoDao->updateStatus($status, $idPedido);
        }
    }
}

#Criar objeto da classe para assim executar o construtor
new PedidoController();
