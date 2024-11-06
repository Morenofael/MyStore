let inputCep = document.getElementById("txtCep");
inputCep.addEventListener("input", ()=>checkCepLength());
function checkCepLength(){
    if(inputCep.value.length == 8){
        getDadosEndereco();
    }
}
function getDadosEndereco(){
    let cep = inputCep.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET",
        "https://viacep.com.br/ws/" + cep + "/json/");
    xhttp.onload = function(){
        var json = xhttp.responseText;
        endereco = JSON.parse(json);
        console.log(endereco);
    }
}
function populateInputs(json){
    console.log(json);
}

function checkButtonCurtir(button){
    var idProduto = button.getAttribute('data-idProduto');
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET",
        BASE_URL + "/controller/CurtidaController.php?action=listJsonFromUsuario");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        curtidas = JSON.parse(json);
        if(curtidas.some(c => c.produto.id == idProduto)){
            button.setAttribute('onclick','descurtir(this)');
            botaoImagem = document.querySelector("button>img");
            botaoImagem.src = "http://localhost:8080/app/view/img/svg/coracao-preenchido.svg";
            botaoTexto = document.querySelector("button>span");
            botaoTexto.innerText = "Descurtir";
        }else{
            button.setAttribute('onclick','curtir(this)');
            botaoImagem = document.querySelector("button>img");
            botaoImagem.src = "http://localhost:8080/app/view/img/svg/coracao.svg";
            botaoTexto = document.querySelector("button>span");
            botaoTexto.innerText = "Curtir";
        }
    }
    
    xhttp.send();
}
