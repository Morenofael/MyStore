<?php
#Nome do arquivo: PedidoDAO.php
#Objetivo: classe DAO para o model de Pedido 

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Pedido.php");
include_once(__DIR__ . "/../model/Usuario.php");

class PedidoDAO{

    //Método para buscar um usuário por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM pedidos p" .
               " WHERE p.id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $pedidos = $this->mapPedidos($result);

        if(count($pedidos) == 1)
            return $pedidos[0];
        elseif(count($pedidos) == 0)
            return null;

        die("PedidoDAO.findById()" . 
            " - Erro: mais de um pedido encontrado.");
    }
   
    //Método para inserir um Usuario
    public function insert(Pedido $pedido) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO pedidos (data, status, id_vendedor, id_comprador, id_produto, valor_total)" .
               " VALUES (CURRENT_DATE, 'NÃO VISTO', :id_vendedor, :id_comprador, :id_produto, :preco)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_vendedor", $pedido->getIdVendedor());
        $stm->bindValue("id_comprador", $pedido->getIdComprador());
        $stm->bindValue("id_produto", $pedido->getIdProduto());
        $stm->bindValue("preco", $pedido->getPreco());
        $stm->execute();
    }

    //Método para excluir um Usuario pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM pedidos WHERE id = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapPedidos($result) {
        $pedidos = array();
        foreach ($result as $reg) {
            $pedido = new Pedido();
            $pedido->setId($reg['id']);
            $pedido->setData($reg['data']);
            $pedido->setStatus($reg['status']);
            $pedido->setIdVendedor($reg['id_vendedor']);
            $pedido->setIdComprador($reg['id_comprador']);
            $pedido->setIdProduto($reg['id_produto']);
            $pedido->setCaminhoComprovante($reg["caminho_comprovante"]);
            $pedido->setPreco($reg["preco"]); 
            
            array_push($pedidos, $pedido);
        }

        return $pedidos;
    }

}
