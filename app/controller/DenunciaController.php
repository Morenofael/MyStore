<?php
#Classe controller para Denuncia 

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/PedidoDAO.php");
require_once(__DIR__ . "/../dao/DenunciaDAO.php");
require_once(__DIR__ . "/../service/ArquivoService.php");
require_once(__DIR__ . "/../service/DenunciaService.php");
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../model/Denuncia.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class UsuarioController extends Controller {

    private UsuarioDAO $usuarioDao;
    private PedidoDAO $pedidoDao;
    private DenunciaDAO $denunciaDao;
    private ArquivoService $arquivoService;
    private DenunciaService $denunciaService;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        //if(! $this->usuarioLogado())
        //    exit;

        $this->usuarioDao = new UsuarioDAO();
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
        $dados["usuario"] = $this->usuarioDao->findById($id);
        $dados["enderecos"] = $this->enderecoDao->listFromUsuario($dados["usuario"]->getId());
        $this->loadView("usuario/usuario.php", $dados);
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        if(! $this->usuarioLogado() || $_SESSION[SESSAO_USUARIO_PAPEL] != 1)
            header("location: HomeController.php?action=home");
        $usuarios = $this->usuarioDao->list();
        //print_r($usuarios);
        $dados["lista"] = $usuarios;

        $this->loadView("usuario/list.php", $dados, $msgErro, $msgSucesso);
    }

    protected function save() {
        $idPedido = $_GET['id'];
        $pedido = $this->pedidoDao->findById($idPedido);
        $texto = trim($_POST['texto']) ? trim($_POST['texto']) : NULL;
         
        $denuncia = new Denuncia();
        $denuncia->setPedido($pedido);
        $denuncia->setTexto($texto); 

        $erros = $this->denunciaService->validarDados($denuncia);
        if(empty($erros)){
            try{
                $arquivoImg = $_FILES["imagem"];
                $arquivoNome = $this->arquivoService->salvarImagem($arquivoImg, 0);
                $denuncia->setCaminhoImagem($arquivoNome); 
                $this->denunciaDao->insert($denuncia);
            }catch (PDOException $e){
                print_r($e);
                array_push($erros, "[Erro ao salvar denúncia na base de dados]");
            }
        }
    }

    //Método create
    protected function create() {
        //echo "Chamou o método create!";
        
        $dados["id"] = 0;
        $dados["idPedido"] = $_GET["id"];
        $this->loadView("denuncia/form.php", $dados);
    }

    //Método edit
    protected function edit() {
        $usuario = $this->findUsuarioById();
        
        if($usuario) {
            $usuario->setSenha("");
            
            //Setar os dados
            $dados["id"] = $usuario->getId();
            $dados["usuario"] = $usuario;
            $dados["papeis"] = UsuarioPapel::getAllAsArray(); 

            $this->loadView("usuario/form.php", $dados);
        } else 
            $this->list("Usuário não encontrado");
    }

    protected function editSenha(string $msgErro=""){
        if(! $this->usuarioLogado())
            exit;
        $usuario = $this->findUsuarioById();
        $senhaAtual = trim($_POST['senhaAtual']) ? trim($_POST['senhaAtual']) : NULL;
        $senha= trim($_POST['senha']) ? trim($_POST['senha']) : NULL;
        $confSenha = trim($_POST['conf_senha']) ? trim($_POST['conf_senha']) : NULL;
        if($_POST["id"]){
            $usuario->setSenha($senhaAtual);
            $erros = $this->usuarioService->validarMudancaSenha($usuario, $senha,  $confSenha);
            if(empty($erros)){

            $this->usuarioDao->editSenha($senha);
            header("location: ./UsuarioController.php?action=display&id=" . $_SESSION[SESSAO_USUARIO_ID]);     
            }
        }
        if($usuario) {
            //Setar os dados
            $dados["id"] = $usuario->getId();
            $dados["usuario"] = $usuario;
            $dados["papeis"] = UsuarioPapel::getAllAsArray(); 
            if($erros)
                $msgErro = implode("<br>", $erros);
            $this->loadView("usuario/senha-form.php", $dados, $msgErro);
        } else 
            $this->list("Usuário não encontrado");
    }

    //Método para excluir
    protected function delete() {
        $usuario = $this->findUsuarioById();
        if($usuario) {
            //Excluir
            $this->usuarioDao->deleteById($usuario->getId());
            $this->list("", "Usuário excluído com sucesso!");
        } else {
            //Mensagem q não encontrou o usuário
            $this->list("Usuário não encontrado!");

        }               
    }

    protected function listJson() {
        $listaUsuarios = $this->usuarioDao->list();
        $json = json_encode($listaUsuarios);
        echo $json;
    }

    //Método para buscar o usuário com base no ID recebido por parâmetro GET
    private function findUsuarioById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $usuario = $this->usuarioDao->findById($id);
        return $usuario;
    }

}


#Criar objeto da classe para assim executar o construtor
new UsuarioController();
