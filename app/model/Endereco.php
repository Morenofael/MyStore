<?php 
#Nome do arquivo: Endereco.php
#Objetivo: classe Model para Endereco 

class Endereco implements JsonSerializable {

    private ?int $id;
    private ?string $rua;
    private ?string $numero;
    private ?string $bairro;
    private ?string $cidade;
    private ?string $estado;
    private ?string $pais;
    private ?string $cep;
    private ?int $idUsuario;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "rua" => $this->rua,
                     "numero" => $this->numero,
                     "bairro" => $this->bairro,
                     "cidade" => $this->cidade,
                     "estado" => $this->estado,
                     "pais" => $this->pais,
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
      * Get rua.
      *
      * @return rua.
      */
     public function getRua()
     {
         return $this->rua;
     }
     
     /**
      * Set rua.
      *
      * @param rua the value to set.
      */
     public function setRua($rua)
     {
         $this->rua = $rua;
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
      * Get bairro.
      *
      * @return bairro.
      */
     public function getBairro()
     {
         return $this->bairro;
     }
     
     /**
      * Set bairro.
      *
      * @param bairro the value to set.
      */
     public function setBairro($bairro)
     {
         $this->bairro = $bairro;
     }
     
     /**
      * Get cidade.
      *
      * @return cidade.
      */
     public function getCidade()
     {
         return $this->cidade;
     }
     
     /**
      * Set cidade.
      *
      * @param cidade the value to set.
      */
     public function setCidade($cidade)
     {
         $this->cidade = $cidade;
     }
     
     /**
      * Get estado.
      *
      * @return estado.
      */
     public function getEstado()
     {
         return $this->estado;
     }
     
     /**
      * Set estado.
      *
      * @param estado the value to set.
      */
     public function setEstado($estado)
     {
         $this->estado = $estado;
     }
     
     /**
      * Get pais.
      *
      * @return pais.
      */
     public function getPais()
     {
         return $this->pais;
     }
     
     /**
      * Set pais.
      *
      * @param pais the value to set.
      */
     public function setPais($pais)
     {
         $this->pais = $pais;
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
