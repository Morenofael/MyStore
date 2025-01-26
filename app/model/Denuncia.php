<?php 
#Nome do arquivo: Denuncia.php
#Objetivo: classe Model para Denuncia 

require_once(__DIR__ . "/Pedido.php");

class Denuncia implements JsonSerializable {

    private ?int $id;
    private ?Pedido $pedido;
    private ?string $status;
    private ?string $caminhoImagem;
    private ?string $texto;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "pedido" => $this->pedido,
                     "status" => $this->status,
                     "caminhoImagem" => $this->caminhoImagem,
                     "texto" => $this->texto);
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
      * Get status.
      *
      * @return status.
      */
     public function getStatus()
     {
         return $this->status;
     }

    public function getStatusTexto(){
        switch($this->status){
            case "NV":
                return "Não Visto";
                break;
            case "INPRO":
                return "Improcedente";
                break;
            case "PRO":
                return "Procedente";
                break;
            default:
                return "404";
        }
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
      * Get caminhoImagem.
      *
      * @return caminhoImagem.
      */
     public function getCaminhoImagem()
     {
         return $this->caminhoImagem;
     }
     
     /**
      * Set caminhoImagem.
      *
      * @param caminhoImagem the value to set.
      */
     public function setCaminhoImagem($caminhoImagem)
     {
         $this->caminhoImagem = $caminhoImagem;
     }
     
     /**
      * Get texto.
      *
      * @return texto.
      */
     public function getTexto()
     {
         return $this->texto;
     }
     
     /**
      * Set texto.
      *
      * @param texto the value to set.
      */
     public function setTexto($texto)
     {
         $this->texto = $texto;
     }
    
    /**
     * Get pedido.
     *
     * @return pedido.
     */
    public function getPedido()
    {
        return $this->pedido;
    }
    
    /**
     * Set pedido.
     *
     * @param pedido the value to set.
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }
}
