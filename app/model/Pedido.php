<?php 
#Nome do arquivo: Pedido.php
#Objetivo: classe Model para Pedido 

class Pedido implements JsonSerializable {

    private ?int $id;
    private ?string $data;
    private ?string $status;
    private ?int $idVendedor;
    private ?int $idComprador;
    private ?int $idProduto;
    private ?string $caminhoComprovante;
    private ?float $preco;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "data" => $this->data,
                     "status" => $this->status,
                     "idVendedor" => $this->idVendedor,
                     "idComprador" => $this->idComprador,
                     "caminhoComprovante" => $this->caminhoComprovante,
                     "preco" => $this->preco);
    }

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
    }
     
     /**
      * Get data.
      *
      * @return data.
      */
     public function getData()
     {
         return $this->data;
     }
     
     /**
      * Set data.
      *
      * @param data the value to set.
      */
     public function setData($data)
     {
         $this->data = $data;
     }
     
     /**
      * Get status.
      *
      * @return status.
      */
     public function getStatus()
     {
         return $this->status;
     }
     
     /**
      * Set status.
      *
      * @param status the value to set.
      */
     public function setStatus($status)
     {
         $this->status = $status;
     }
    
    /**
     * Get vendedor.
     *
     * @return vendedor.
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }
    
    /**
     * Set vendedor.
     *
     * @param vendedor the value to set.
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor= $idVendedor;
    }
    
    /**
     * Get comprador.
     *
     * @return comprador.
     */
    public function getIdComprador()
    {
        return $this->idComprador;
    }
    
    /**
     * Set comprador.
     *
     * @param comprador the value to set.
     */
    public function setIdComprador($idComprador)
    {
        $this->idComprador = $idComprador;
    }
     
     /**
      * Get caminhoComprovante.
      *
      * @return caminhoComprovante.
      */
     public function getCaminhoComprovante()
     {
         return $this->caminhoComprovante;
     }
     
     /**
      * Set caminhoComprovante.
      *
      * @param caminhoComprovante the value to set.
      */
     public function setCaminhoComprovante($caminhoComprovante)
     {
         $this->caminhoComprovante = $caminhoComprovante;
     }
    
    /**
     * Get preco.
     *
     * @return preco.
     */
    public function getPreco()
    {
        return $this->preco;
    }
    
    /**
     * Set preco.
     *
     * @param preco the value to set.
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
    
    /**
     * Get idProduto.
     *
     * @return idProduto.
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }
    
    /**
     * Set idProduto.
     *
     * @param idProduto the value to set.
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }
}
