<?php
#Classe controller para Denuncia 

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/PedidoDAO.php");
require_once(__DIR__ . "/../dao/DenunciaDAO.php");
require_once(__DIR__ . "/../service/ArquivoService.php");
require_once(__DIR__ . "/../service/DenunciaService.php");
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../model/Denuncia.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class DenunciaController extends Controller {

    private PedidoDAO $pedidoDao;
    private DenunciaDAO $denunciaDao;
    private ArquivoService $arquivoService;
    private DenunciaService $denunciaService;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        //if(! $this->usuarioLogado())
        //    exit;

        $this->pedidoDao = new PedidoDAO();
        $this->denunciaDao = new DenunciaDAO();
        $this->arquivoService = new ArquivoService();
        $this->denunciaService = new DenunciaService();

        $this->handleAction();
    }

    protected function display(){
        //DAR id depois do edit
        if(! $this->usuarioLogado())
            exit;
        $id = $_GET['id'];
        $dados["denuncia"] = $this->denunciaDao->findById($id);
        $this->loadView("denuncia/denuncia.php", $dados);
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        if(! $this->usuarioLogado() || $_SESSION[SESSAO_USUARIO_PAPEL] != 1)
            header("location: HomeController.php?action=home");
        $denuncias = $this->denunciaDao->list();
        //print_r($usuarios);
        $dados["lista"] = $denuncias;

        $this->loadView("denuncia/list.php", $dados, $msgErro, $msgSucesso);
    }

    protected function save() {
        $idPedido = $_POST['idPedido'];
        $pedido = $this->pedidoDao->findById($idPedido);
        $texto = trim($_POST['texto']) ? trim($_POST['texto']) : NULL;
         
        $denuncia = new Denuncia();
        $denuncia->setPedido($pedido);
        $denuncia->setTexto($texto); 

        $erros = $this->denunciaService->validarDados($denuncia);
        if(empty($erros)){
            try{
                $arquivoImg = $_FILES["file"];
                $arquivoNome = $this->arquivoService->salvarImagem($arquivoImg, 0);
                $denuncia->setCaminhoImagem($arquivoNome); 
                $this->denunciaDao->insert($denuncia);
                header("location: HomeController.php?action=home");
            }catch (PDOException $e){
                print_r($e);
                array_push($erros, "[Erro ao salvar denúncia na base de dados]");
            }
        }
    }

    //Método create
    protected function create() {
        //echo "Chamou o método create!";
        
        $dados["idPedido"] = $_GET["idPedido"];
        $this->loadView("denuncia/form.php", $dados);
    }

    protected function alterStatus(){
        if(!$this->usuarioLogado())
            exit;
        if($_SESSION[SESSAO_USUARIO_PAPEL] != 1)
            exit;
        $this->denunciaDao->editStatus($_POST['status'], $_POST['id']);
    }

    //Método para buscar o usuário com base no ID recebido por parâmetro GET
    private function findDenunciaById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $denuncia = $this->denunciaDao->findById($id);
        return $denuncia;
    }

}


#Criar objeto da classe para assim executar o construtor
new DenunciaController();
