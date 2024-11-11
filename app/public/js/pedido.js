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
        verificarCampos();
        if(json == "")
            verificarCampos();
    } 
    xhttp.send("idEndereco=" + encodeURIComponent(idEnderecoEntrega) +  "&idPedido=" + encodeURIComponent(idPedido));
}

function salvarComprovante() {
    let files = fileComprovante.files;
    if(files.length>0){
        let file = files[0];
        //caminhoComprovante = file.name;
        
        var formData = new FormData();
        formData.append("file[]", file);
        formData.append("idPedido", idPedido);
        
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST",
            BASE_URL + "/controller/PedidoController.php?action=updateCaminhoComprovante", true);
        xhttp.onload = function() {
            var json = xhttp.responseText;
            if(json == "")
                verificarCampos();
        }

        xhttp.send(formData);

    }else{
        alert("Selecione um arquivo");
    }
    
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