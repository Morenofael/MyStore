<?php 
#Nome do arquivo: Usuario.php
#Objetivo: classe Model para Usuario

require_once(__DIR__ . "/enum/UsuarioPapel.php");

class Usuario implements JsonSerializable {

    private ?int $id;
    private ?string $nome;
    private ?string $login;
    private ?string $senha;
    private ?int $nivelAcesso;

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                     "nome" => $this->nome,
                     "login" => $this->login,
                     "nivelAcesso" => $this->nivelAcesso);
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

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getNivelAcesso(): ?int
    {
        return $this->nivelAcesso;
    }

    public function setNivelAcesso(?int $nivelAcesso): self
    {
        $this->nivelAcesso = $nivelAcesso;

        return $this;
    }
}
