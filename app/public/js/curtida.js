function curtir(button) {
    var idProduto = button.getAttribute('data-idProduto');
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 
                "http://localhost:8080/app/controller/CurtidaController.php?action=save");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        if(json == "")
            checkButtonCurtir(button); 
    }

    xhttp.send("idProduto=" + encodeURIComponent(idProduto));
}
function checkButtonCurtir(button){
    var idProduto = button.getAttribute('data-idProduto');
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", 
        "http://localhost:8080/app/controller/CurtidaController.php?action=listJsonFromUsuario");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        curtidas = JSON.parse(json);
        if(curtidas.some(c => c.produto.id == idProduto)){
            botaoImagem = document.querySelector("button>img");
            botaoImagem.src = "http://localhost:8080/app/view/img/svg/coracao-preenchido.svg";
            botaoTexto = document.querySelector("button>span");
            botaoTexto.innerText = "Descurtir";
        }
    }
    
    xhttp.send();
}
checkButtonCurtir(document.querySelector("button"));
