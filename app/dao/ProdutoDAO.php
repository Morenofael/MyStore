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

    public function listByBrecho(int $idBrecho){
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produtos p " . 
            " WHERE id_brecho = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idBrecho]);
        $result = $stm->fetchAll();
        
        return $this->mapProdutos($result);

    }

    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produtos p" .
               " WHERE p.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $produtos = $this->mapProdutos($result);

        if(count($produtos) == 1)
            return $produtos[0];
        elseif(count($produtos) == 0)
            return null;

        die("ProdutoDAO.findById()" . 
            " - Erro: mais de um produto encontrado.");
    }

/*
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

    //Método para atualizar um Produto
    public function update(Produto $produto) {
        $conn = Connection::getConn();

        $sql = "UPDATE usuarios SET nome = :nome, descricao = :descricao," . 
               " preco = :preco" .   
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $produto->getNome());
        $stm->bindValue("descricao", $produto->getDescricao());
        $stm->bindValue("preco", $produto->getPreco());
        $stm->bindValue("id", $produto->getId());
        $stm->execute();
    }
/*
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
