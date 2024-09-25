<?php
include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Endereco.php");

class EnderecoDAO{
/*
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM brechos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapBrechos($result);
    }
 */
    public function insert(Endereco $endereco) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO produtos (rua, numero, bairro, cidade, estado, pais, cep, id_usuario)" .
               " VALUES (:rua, :numero, :bairro, :cidade, :estado, :pais, :cep, :id_usuario)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("rua", $endereco->getRua());
        $stm->bindValue("numero", $endereco->getNumero());
        $stm->bindValue("bairro", $endereco->getBairro());
        $stm->bindValue("cidade", $endereco->getCidade());
        $stm->bindValue("estado", $endereco->getEstado());
        $stm->bindValue("pais", $endereco->getPais());
        $stm->bindValue("cep", $endereco->getCep());
        $stm->bindValue("id_usuario", $endereco->getIdUsuario());
        $stm->execute();
    }
/* 
    public function update(Brecho $brecho) {
        $conn = Connection::getConn();

        $sql = "UPDATE brechos SET nome = :nome, descricao = :descricao" . 
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $brecho->getNome());
        $stm->bindValue("descricao", $brecho->getDescricao());
        $stm->bindValue("id", $brecho->getId());
        $stm->execute();
    }

    public function findByIdUsuario(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM brechos b" .
               " WHERE b.id_usuario = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $brechos = $this->mapBrechos($result);

        if(count($brechos) == 1)
            return $brechos[0];
        elseif(count($brechos) == 0)
            return null;

        die("BrechoDAO.findById()" . 
            " - Erro: mais de um brechó encontrado.");
    }
    
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM brechos b" .
               " WHERE b.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $brechos = $this->mapBrechos($result);

        if(count($brechos) == 1)
            return $brechos[0];
        elseif(count($brechos) == 0)
            return null;

        die("BrechoDAO.findById()" . 
            " - Erro: mais de um brechó encontrado.");
    }
   
    private function mapBrechos($result) {
        $brechos = array();
        foreach ($result as $reg) {
            $brecho = new Brecho();
            $brecho->setId($reg['id']);
            $brecho->setNome($reg['nome']);
            $brecho->setDescricao($reg['descricao']);
            $brecho->setDataCriacao($reg['data_criacao']);
            $brecho->setId_usuario($reg['id_usuario']);
            array_push($brechos, $brecho);
        }

        return $brechos;
    }
 */
}
