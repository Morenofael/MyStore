const BASE_URL = document.getElementById('ipnBaseUrl').value;
const selEndereco = document.getElementById('selEndereco');
const idPedido = document.getElementById('pedidoId').value;
function salvarEndereco() {
    let idEndereco = selEndereco.value; 
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST",
                BASE_URL + "/controller/PedidoController.php?action=updateIdEndereco");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        if(json == "")
            console.log("lol");
    }

    xhttp.send("idEndereco=" + encodeURIComponent(idEndereco) +  "&idPedido=" + encodeURIComponent(idPedido));
}

