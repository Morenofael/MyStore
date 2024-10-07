<?php
class ArquivoService{
    public function salvarImagemProduto($arquivoImg){
        if($arquivoImg['size'] <= 0) {
			echo "O campo arquivo não foi enviado!"; 
			exit;
		}

		//Captura o nome e a extensão do arquivo
		$arquivoNome = explode('.', $arquivoImg['name']);
		$arquivoExtensao = $arquivoNome[1];

		//A partir da extensão, o ideal é gerar um nome único para o arquivo a fim de encontrá-lo depois
		$nomeArquivoSalvar = "imagem_" . uniqid('', true) . "." . $arquivoExtensao;
        if(move_uploaded_file($arquivoImg["tmp_name"], PATH_ARQUIVOS . $nomeArquivoSalvar)){
            echo "deu certo!";
        }else{
            echo "O arquivo não pôde ser salvo, e retornou o erro " . $_FILES["imagem"]["erro"];
            exit;
        }
    }
}