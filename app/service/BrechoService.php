<?php
    
require_once(__DIR__ . "/../model/Brecho.php");
require_once(__DIR__ . "/../controller/BrechoController.php");

class BrechoService {
    private BrechoController $brechoCont;

    public function __construct(){
        $this->brechoCont = new BrechoController();
    }

    public function verificarExistente(?int $id){
        $erros = array();
        if($this->brechoCont->findByIdUsuario($id) != null)
            array_push($erros, "Usuário já possui brechó");
        return $erros;
    }
    /* Método para validar os dados do usuário que vem do formulário */
    public function validarDados(Brecho $brecho) {
        $erros = array();

        //Validar campos vazios
        if(! $brecho->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");
        
        if(! $brecho->getDescricao())
            array_push($erros, "O campo [Descrição] é obrigatório");
        
        return $erros;
        
    }

}
