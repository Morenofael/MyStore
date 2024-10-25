<?php

include_once (__DIR__ . "/../connection/Connection.php");
include_once (__DIR__ . "/../model/Curtida.php");
include_once (__DIR__ . "/../model/Produto.php");

class CurtidaDAO{
    public function insert(Curtida $curtida){
        $conn = Connection::getConn();

        $sql =
            "INSERT INTO curtidas (id_usuario, id_produto)" .
            "VALUES (:id_usuario, :id_produto)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id_usuario", $curtida->getIdUsuario());
        $stm->bindValue("id_produto", $curtida->getProduto()->getId());
        $stm->execute();
    }

    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM curtidas c" .
               " WHERE c.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $curtidas = $this->mapCurtidas($result);

        if(count($curtidas) == 1)
            return $curtidas[0];
        elseif(count($curtidas) == 0)
            return null;

        die("CurtidaDAO.findById()" . 
            " - Erro: mais de uma curtida encontrada.");
    }

    private function mapCurtidas($result){
        $curtidas = [];
        foreach ($result as $reg) {
            $curtida = new Curtida();
            $curtida->setId($reg["id"]);
            $curtida->setIdUsuario($reg["id_usuario"]);
            //$imagem->setArquivoNome($reg["arquivo"]);

            //array_push($imagens, $imagem);
        }

        return $curtidas;
    }
}
