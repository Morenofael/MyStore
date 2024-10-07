<?php
class ArquivoService{
    public function salvarImagemProduto($arquivo){
        $totalImagens = count($arquivo["name"]);
        for($i = 0; $i < $totalImagens; $i++){
            if($arquivo['size'][$i] <= 0) {
			    echo "O campo arquivo não foi enviado!"; 
			    exit;
		    }

		    //Captura o nome e a extensão do arquivo
		    $arquivoNome = explode('.', $arquivo['name'][$i]);
		    $arquivoExtensao = $arquivoNome[1];

		    //A partir da extensão, o ideal é gerar um nome único para o arquivo a fim de encontrá-lo depois
		    $nomeArquivoSalvar = "imagem_" . uniqid('', true) . "." . $arquivoExtensao;
            if(move_uploaded_file($arquivo["tmp_name"][$i], PATH_ARQUIVOS . $nomeArquivoSalvar)){
                echo "deu certo!";
            }else{
                echo "O arquivo não pôde ser salvo, e retornou o erro " . $arquivo["error"][$i];
                exit;
            }
        }
    }
}