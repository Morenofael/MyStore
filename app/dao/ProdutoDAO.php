<?php
#Nome do arquivo: ProdutoDAO.php
#Objetivo: classe DAO para o model de Produto

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Produto.php");

class ProdutoDAO {

    //Método para listar os produtos a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produtos p ";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapProdutos($result);
    }
/*    //Método para buscar um usuário por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u" .
               " WHERE u.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapProdutos($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById()" . 
            " - Erro: mais de um usuário encontrado.");
    }
   
   //Método para buscar um usuário por seu Email 
    public function findByEmail(string $email) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u" .
               " WHERE u.email = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$email]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapProdutos($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findByEmail()" . 
            " - Erro: mais de um usuário encontrado.");
    }


    //Método para buscar um usuário por seu login e senha
    public function findByLoginSenha(string $login, string $senha) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuarios u" .
               " WHERE BINARY u.login = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$login]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapProdutos($result);

        if(count($usuarios) == 1) {
            //Tratamento para senha criptografada
            if(password_verify($senha, $usuarios[0]->getSenha()))
                return $usuarios[0];
            else
                return null;
        } elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findByLoginSenha()" . 
            " - Erro: mais de um usuário encontrado.");
    }
*/
    //Método para inserir um Produto
    public function insert(Produto $produto) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO produtos (id_brecho, nome, preco, descricao)" .
               " VALUES (:id_brecho, :nome, :preco, :descricao)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_brecho", $produto->getIdBrecho());
        $stm->bindValue("nome", $produto->getNome());
        $stm->bindValue("preco", $produto->getPreco());
        $stm->bindValue("descricao", $produto->getDescricao());
        $stm->execute();
    }
/*
    //Método para atualizar um Usuario
    public function update(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE usuarios SET nome = :nome, login = :login," . 
               " senha = :senha, nivel_acesso = :nivel_acesso" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNome());
        $stm->bindValue("login", $usuario->getLogin());
        $senhaCript = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        $stm->bindValue("senha", $senhaCript);
        $stm->bindValue("nivel_acesso", $usuario->getNivelAcesso());
        $stm->bindValue("id", $usuario->getId());
        $stm->execute();
    }

    //Método para excluir um Usuario pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM usuarios WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    public function count() {
        $conn = Connection::getConn();

        $sql = "SELECT COUNT(*) total FROM usuarios";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $result[0]["total"];
    }
*/
    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapProdutos($result) {
        $produtos = array();
        foreach ($result as $reg) {
            $produto = new Produto();
            $produto->setId($reg['id']);
            $produto->setIdBrecho($reg['id_brecho']);
            $produto->setNome($reg['nome']);
            $produto->setPreco($reg['preco']);
            $produto->setDescricao($reg['descricao']);
            array_push($produtos, $produto);
        }

        return $produtos;
    }

}
