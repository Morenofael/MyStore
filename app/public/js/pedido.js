const BASE_URL = document.getElementById('ipnBaseUrl').value;
const selEndereco = document.getElementById('selEndereco');
const fileComprovante = document.getElementById('fileComprovante');
const btnSalvarEndereco = document.getElementById('btnSalvarEndereco');
const btnSalvarComprovante = document.getElementById('btnSalvarComprovante');
const idPedido = document.getElementById('pedidoId').value;
let idEnderecoEntrega = document.getElementById('idEnderecoEntrega').value;
let caminhoComprovante = document.getElementById('caminhoComprovante').value;

function salvarEndereco() {
    idEnderecoEntrega = selEndereco.value; 
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST",
                BASE_URL + "/controller/PedidoController.php?action=updateIdEndereco");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        if(json == "")
            verificarCampos();
    }
}

function salvarComprovante() {
    let file = fileComprovante.files[0]; 
    let caminhoComprovante = file.name;
        
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST",
                BASE_URL + "/controller/PedidoController.php?action=updateCaminhoComprovante");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        if(json == "")
            verificarCampos();
    }


    xhttp.send("file=" + encodeURIComponent(file));
}

function verificarCampos(){
    if(idEnderecoEntrega){
        selEndereco.setAttribute("disabled", "disabled");
        btnSalvarEndereco.setAttribute("disabled", "disabled");
    }
    if(caminhoComprovante){
        fileComprovante.setAttribute("disabled", "disabled");
        btnSalvarComprovante.setAttribute("disabled", "disabled");
    }
}
verificarCampos();
