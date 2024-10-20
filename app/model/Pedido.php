<?php 
#Nome do arquivo: Pedido.php
#Objetivo: classe Model para Pedido 

require_once(__DIR__ . "/Usuario.php");

class Produto implements JsonSerializable {

    private ?int $id;
    private ?string $data;
    private ?string $status;
    private ?Usuario $vendedor;
    private ?Usuario $comprador;
    private ?string $caminhoComprovante;
    private ?float $preco;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "data" => $this->data,
                     "status" => $this->status,
                     "vendedor" => $this->vendedor,
                     "comprador" => $this->comprador,
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
    public function getVendedor()
    {
        return $this->vendedor;
    }
    
    /**
     * Set vendedor.
     *
     * @param vendedor the value to set.
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }
    
    /**
     * Get comprador.
     *
     * @return comprador.
     */
    public function getComprador()
    {
        return $this->comprador;
    }
    
    /**
     * Set comprador.
     *
     * @param comprador the value to set.
     */
    public function setComprador($comprador)
    {
        $this->comprador = $comprador;
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
}
