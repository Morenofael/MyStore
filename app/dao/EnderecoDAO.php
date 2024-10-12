<?php
include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Endereco.php");

class EnderecoDAO{

    public function listFromUsuario(int $idUsuario) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM enderecos WHERE id_usuario = :id_usuario";
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_usuario", $idUsuario);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEnderecos($result);
    }

    public function insert(Endereco $endereco) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO enderecos(numero, cep, id_usuario)" .
               " VALUES (:numero, :cep, :id_usuario)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("numero", $endereco->getNumero());
        $stm->bindValue("cep", $endereco->getCep());
        $stm->bindValue("id_usuario", $endereco->getIdUsuario());
        $stm->execute();
    }
 
    public function update(Endereco $endereco) {
        $conn = Connection::getConn();

        $sql = "UPDATE enderecos SET cep = :cep, numero = :numero" . 
               " WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("cep", $endereco->getCep());
        $stm->bindValue("numero", $endereco->getNumero());
        $stm->bindValue("id", $endereco->getId());
        $stm->execute();
    }

    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM enderecos WHERE id = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }
/*
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
 */    
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM enderecos e" .
               " WHERE e.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $enderecos = $this->mapEnderecos($result);

        if(count($enderecos) == 1)
            return $enderecos[0];
        elseif(count($enderecos) == 0)
            return null;

        die("EnderecoDAO.findById()" . 
            " - Erro: mais de um endereço encontrado.");
    }
 
    private function mapEnderecos($result) {
        $enderecos = array();
        foreach ($result as $reg) {
            $endereco = new Endereco();
            $endereco->setId($reg['id']);
            $endereco->setCep($reg['cep']);
            $endereco->setNumero($reg['numero']);
            $endereco->setIdUsuario($reg['id_usuario']);
            array_push($enderecos, $endereco);
        }

        return $enderecos;
    }
}
