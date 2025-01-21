<?php
    
require_once(__DIR__ . "/../model/Denuncia.php");

class DenunciaService {

/* Método para validar os dados da denuncia que vem do formulário */
    public function validarDados(Denuncia $denuncia) {
        $erros = array();

        //Validar campos vazios
        if(! $denuncia->getTexto())
            array_push($erros, "O campo [Texto] é obrigatório.");

        return $erros;
        
    }
}
