<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/CurtidaDAO.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../model/Curtida.php");

class CurtidaController extends Controller {

    private CurtidaDAO $curtidaDao;
    private ProdutoDAO $produtoDao;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        $this->curtidaDao = new CurtidaDAO();
        $this->produtoDao = new ProdutoDAO();
        //$this->usuarioService = new UsuarioService();

        $this->handleAction();
    }
    
    /*protected function list(string $msgErro = "", string $msgSucesso = "") {
        if(! $this->usuarioLogado() || $_SESSION[SESSAO_USUARIO_PAPEL] != 1)
            header("location: HomeController.php?action=home");
        $usuarios = $this->usuarioDao->list();
        //print_r($usuarios);
        $dados["lista"] = $usuarios;

        $this->loadView("usuario/list.php", $dados, $msgErro, $msgSucesso);
    }*/

    protected function save(){
        $idProduto = $_POST['idProduto'];
        $produto = $this->produtoDao->findById($idProduto);

        //Cria objeto Curtida
        $curtida = new Curtida();
        $curtida->setIdUsuario($_SESSION[SESSAO_USUARIO_ID]);
        $curtida->setProduto($produto);
        try {
            $this->curtidaDao->insert($curtida);
        }
        catch (PDOException $e) {
                print_r($e);
            }
        }
     

    //Método para excluir
    protected function delete() {
        $curtida = $this->findCurtidaById();
        if($curtida) {
            //Excluir
            $this->curtidaDao->deleteById($curtida->getId());
        }     
     }

    private function findCurtidaById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $curtida = $this->curtidaDao->findById($id);
        return $curtida;
    }

    protected function listJsonFromUsuario() {
        $listaCurtidas = $this->curtidaDao->listFromUsuario();
        $json = json_encode($listaCurtidas);
        echo $json;
    }

}


#Criar objeto da classe para assim executar o construtor
new CurtidaController();