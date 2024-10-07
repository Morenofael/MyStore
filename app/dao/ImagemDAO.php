<?php

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Endereco.php");

class ImagemDAO{
    public function insert(Imagem $imagem){
        $conn = Connection::getConn();

        $sql = "INSERT INTO imagens (id_produto, arquivo_nome)" . 
        "VALUES (:id_produto, :arquivo_nome)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id_produto", $imagem->getIdProduto());
        $stm->bindValue("arquivo_nome", $imagem->getArquivoNome());
        $stm->execute();
    }
}