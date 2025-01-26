<?php
#Nome do arquivo: PedidoDAO.php
#Objetivo: classe DAO para o model de Pedido

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Denuncia.php");
include_once(__DIR__ . "/../model/Pedido.php");

class DenunciaDAO{

    //Método para buscar um usuário por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT d.*, " .
                " ped.data AS data_pedido, ped.status AS status_pedido, ped.id_endereco_entrega AS id_endereco_entrega, ped.caminho_comprovante AS caminho_comprovante, ped.preco AS preco_pedido " .
                " uv.nome AS nome_vendedor , uv.email AS email_vendedor, uv.cpf AS cpf_vendedor, uv.telefone AS telefone_vendedor, uv.data_nascimento AS data_nascimento_vendedor, uv.situacao AS situacao_vendedor, uv.foto_perfil AS foto_perfil_vendedor,  " .
                " uc.nome AS nome_comprador , uc.email AS email_comprador, uc.cpf AS cpf_comprador, uc.telefone AS telefone_comprador, uc.data_nascimento AS data_nascimento_comprador, uc.situacao AS situacao_comprador, uc.foto_perfil AS foto_perfil_comprador,  " .
                " prod.id_brecho AS id_brecho_produto , prod.nome AS nome_produto, prod.descricao AS descricao_produto, prod.preco AS preco_produto, prod.genero AS genero_produto, " .
                "  b.nome AS nome_brecho, b.descricao AS descricao_brecho, b.chave_pix AS chave_pix_brecho" .
                " FROM denuncias d " .
                " JOIN pedidos ped ON (ped.id = d.id_pedido) JOIN usuarios uv ON (uv.id = p.id_vendedor) JOIN usuarios uc ON (uc.id = p.id_comprador) JOIN produtos prod ON (prod.id = p.id_produto) JOIN brechos b ON (b.id = prod.id_brecho)" .
               " WHERE d.id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $denuncia = $this->mapDenuncias($result);

        if(count($denuncia) == 1)
            return $denuncia[0];
        elseif(count($denuncia) == 0)
            return null;

        die("DenunciaDAO.findById()" .
            " - Erro: mais de uma denuncia encontrada.");
    }

    public function insert(Denuncia $denuncia) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO denuncias (id_pedido, status, caminho_imagem, texto)" .
               " VALUES (:id_pedido, :status, :caminho_imagem, :texto)";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id_pedido", $denuncia->getPedido()->getId());
        $stm->bindValue("status", "NV");
        $stm->bindValue("caminho_imagem", $denuncia->getCaminhoImagem());
        $stm->bindValue("texto", $denuncia->getTexto());
        $stm->execute();
    }
    
    public function list(){
        $conn = Connection::getConn();
        $sql = "SELECT d.*, " .
                " ped.data AS data_pedido, ped.status AS status_pedido, ped.id_endereco AS id_endereco, ped.caminho_comprovante AS caminho_comprovante, ped.valor_total AS preco_pedido, " .
                " ped.id_vendedor AS id_vendedor, uv.nome AS nome_vendedor , uv.email AS email_vendedor, uv.cpf AS cpf_vendedor, uv.telefone AS telefone_vendedor, uv.data_nascimento AS data_nascimento_vendedor, uv.situacao AS situacao_vendedor, uv.foto_perfil AS foto_perfil_vendedor,  " .
                " ped.id_comprador AS id_comprador , uc.nome AS nome_comprador , uc.email AS email_comprador, uc.cpf AS cpf_comprador, uc.telefone AS telefone_comprador, uc.data_nascimento AS data_nascimento_comprador, uc.situacao AS situacao_comprador, uc.foto_perfil AS foto_perfil_comprador,  " .
                " prod.id_brecho AS id_brecho_produto , prod.nome AS nome_produto, prod.descricao AS descricao_produto, prod.preco AS preco_produto, prod.genero AS genero_produto, " .
                "  b.nome AS nome_brecho, b.descricao AS descricao_brecho, b.chave_pix AS chave_pix_brecho" .
                " FROM denuncias d " .
                " JOIN pedidos ped ON (ped.id = d.id_pedido) JOIN usuarios uv ON (uv.id = ped.id_vendedor) JOIN usuarios uc ON (uc.id = ped.id_comprador) JOIN produtos prod ON (prod.id = ped.id_produto) JOIN brechos b ON (b.id = prod.id_brecho) ";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $denuncias = $this->mapDenuncias($result);
        return $denuncias;
    }

    //Método para excluir um Usuario pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM denuncias WHERE id = :id";

        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapDenuncias($result) {
        $denuncias = array();
        foreach ($result as $reg) {
            $pedido = new Pedido();
            $pedido->setId($reg['id_pedido']);
            $pedido->setData($reg['data']);
            $pedido->setStatus($reg['status']);

            $vendedor = new Usuario();
            $vendedor->setId($reg['id_vendedor']);
            $vendedor->setNome($reg['nome_vendedor']);
            $vendedor->setEmail($reg['email_vendedor']);
            $vendedor->setCpf($reg['cpf_vendedor']);
            $vendedor->setTelefone($reg['telefone_vendedor']);
            $vendedor->setDataNascimento($reg['data_nascimento_vendedor']);
            $vendedor->setSituacao($reg['situacao_vendedor']);
            $vendedor->setFotoPerfil($reg['foto_perfil_vendedor']);

            $pedido->setVendedor($vendedor);

            $comprador = new Usuario();
            $comprador->setId($reg['id_comprador']);
            $comprador->setNome($reg['nome_comprador']);
            $comprador->setEmail($reg['email_comprador']);
            $comprador->setCpf($reg['cpf_comprador']);
            $comprador->setTelefone($reg['telefone_comprador']);
            $comprador->setDataNascimento($reg['data_nascimento_comprador']);
            $comprador->setSituacao($reg['situacao_comprador']);
            $comprador->setFotoPerfil($reg['foto_perfil_comprador']);

            $pedido->setComprador($comprador);

            $produto = new Produto();
            $produto->setId($reg['id_produto']);
            $produto->setNome($reg['nome_produto']);
            $produto->setDescricao($reg['descricao_produto']);
            $produto->setPreco($reg['preco_produto']);
            $produto->setGenero($reg['genero_produto']);

            $pedido->setProduto($produto);

            $brecho = new Brecho();
            $brecho->setId($reg['id_brecho']);
            $brecho->setNome($reg['nome_brecho']);
            $brecho->setDescricao($reg['descricao_brecho']);
            $brecho->setChavePix($reg['chave_pix_brecho']);
            $produto->setBrecho($brecho);

            $produto->setBrecho($brecho);
            $pedido->setidEnderecoEntrega($reg['id_endereco']);

            $pedido->setCaminhoComprovante($reg["caminho_comprovante"]);
            $pedido->setPreco($reg["valor_total"]);
            
            $denuncia = new Denuncia();
            
            $denuncia->setId($reg['id']);
            $denuncia->setStatus($reg['status']);
            $denuncia->setTexto($reg['texto']);
            $denuncia->setCaminhoImagem($reg['caminho_imagem']);
            $denuncia->setPedido($pedido);

            array_push($denuncias, $denuncia);
        }

        return $denuncias;
    }

}
