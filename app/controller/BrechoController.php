<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/BrechoDAO.php");
require_once(__DIR__ . "/../model/Brecho.php");

class BrechoController extends Controller {

    private BrechoDAO $brechoDao;

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        //if(! $this->usuarioLogado())
        //    exit;

        $this->brechoDao = new BrechoDAO();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        /*if(! $this->usuarioLogado() || $_SESSION[SESSAO_USUARIO_PAPEL] != 1)
            header("location: HomeController.php?action=home");
        $usuarios = $this->usuarioDao->list();
        //print_r($usuarios);
        $dados["lista"] = $usuarios;

        $this->loadView("usuario/list.php", $dados, $msgErro, $msgSucesso);
         */}

    protected function save() {
        //Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
        $descricao = trim($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
        $dataCriacao = date('d/m/Y', null);
        $id_usuario = $_SESSION[SESSAO_USUARIO_ID];

        //Cria objeto Usuario
        $brecho = new Brecho();
        $brecho->setNome($nome);
        $brecho->setDescricao($descricao);
        $brecho->setDataCriacao($dataCriacao);
        $brecho->setId_usuario($id_usuario);
        //Validar os dados
        //TODO - implementar brechoService
        $erros = $this->usuarioService->validarDados($usuario, $confSenha);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id"] == 0)  //Inserindo
                    $this->usuarioDao->insert($usuario);
                else { //Alterando
                    $usuario->setId($dados["id"]);
                    $this->usuarioDao->update($usuario);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Usuário salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                //print_r($e);
                array_push($erros, "[Erro ao salvar o usuário na base de dados.]");                
            }
        }

        //Se há erros, volta para o formulário
        
        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["usuario"] = $usuario;
        $dados["confSenha"] = $confSenha;
        $dados["papeis"] = UsuarioPapel::getAllAsArray();
        
        $msgsErro = implode("<br>", $erros);
        $this->loadView("usuario/form.php", $dados, $msgsErro);
     }

    //Método create
    protected function create() {
        //echo "Chamou o método create!";

        
        $dados["id"] = 0;
        $this->loadView("brecho/form.php", $dados);
    }

    //Método edit
    protected function edit() {/*
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
     */}

    //Método para excluir
    protected function delete() {/*
        $usuario = $this->findUsuarioById();
        if($usuario) {
            //Excluir
            $this->usuarioDao->deleteById($usuario->getId());
            $this->list("", "Usuário excluído com sucesso!");
        } else {
            //Mensagem q não encontrou o usuário
            $this->list("Usuário não encontrado!");

        }               
     */}

    protected function listJson() {/*
        $listaUsuarios = $this->usuarioDao->list();
        $json = json_encode($listaUsuarios);
        echo $json;
     */}

    //Método para buscar o usuário com base no ID recebido por parâmetro GET
    private function findUsuarioById() {/*
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $usuario = $this->usuarioDao->findById($id);
        return $usuario;
     */}

}


#Criar objeto da classe para assim executar o construtor
new UsuarioController();
