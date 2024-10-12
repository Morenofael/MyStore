<?php 
#Nome do arquivo: Endereco.php
#Objetivo: classe Model para Endereco 

class Endereco implements JsonSerializable {

    private ?int $id;
    private ?string $cep;
    private ?string $numero;
    private ?int $idUsuario;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "numero" => $this->numero,
                     "cep" => $this->cep,
                     "idUsuario" => $this->idUsuario);
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
      * Get numero.
      *
      * @return numero.
      */
     public function getNumero()
     {
         return $this->numero;
     }
     
     /**
      * Set numero.
      *
      * @param numero the value to set.
      */
     public function setNumero($numero)
     {
         $this->numero = $numero;
     }
     
     /**
      * Get cep.
      *
      * @return cep.
      */
     public function getCep()
     {
         return $this->cep;
     }
     
     /**
      * Set cep.
      *
      * @param cep the value to set.
      */
     public function setCep($cep)
     {
         $this->cep = $cep;
     }
    
    /**
     * Get idUsuario.
     *
     * @return idUsuario.
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    /**
     * Set idUsuario.
     *
     * @param idUsuario the value to set.
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
}
