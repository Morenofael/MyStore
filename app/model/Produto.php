<?php 
#Nome do arquivo: Produto.php
#Objetivo: classe Model para Produto 

include_once(__DIR__ . "/Brecho.php");
class Produto implements JsonSerializable {

    private ?int $id;
    private ?Brecho $brecho;
    private ?string $nome;
    private ?string $descricao;
    private ?float $preco;
    private ?string $genero;
    private ?string $tags;
    
    public function __construct(){
        $this->brecho = null;
    }
    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "brecho" => $this->brecho,
                     "nome" => $this->nome,
                     "descricao" => $this->descricao,
                     "preco" => $this->preco,
                     "genero" => $this->genero,
                     "tags" => $this->tags);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idBrecho
     */
    public function getBrecho(): ?Brecho
    {
        return $this->brecho;
    }

    /**
     * Set the value of idBrecho
     */
    public function setBrecho(?Brecho $brecho): self
    {
        $this->brecho = $brecho;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of preco
     */
    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function getPrecoReais(): string
    {
        if($this->preco)    
            return "R$" . number_format($this->preco, 2, ",", ".");

        return "";
    }

    /**
     * Set the value of preco
     */
    public function setPreco(?float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }
     
     /**
      * Get genero.
      *
      * @return genero.
      */
     public function getGenero()
     {
         return $this->genero;
     }
     
     /**
      * Set genero.
      *
      * @param genero the value to set.
      */
     public function setGenero($genero)
     {
         $this->genero = $genero;
     }
     
     /**
      * Get tags.
      *
      * @return tags.
      */
     public function getTags()
     {
         return $this->tags;
     }
     
     /**
      * Set tags.
      *
      * @param tags the value to set.
      */
     public function setTags($tags)
     {
         $this->tags = $tags;
     }
}
