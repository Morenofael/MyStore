const BASE_URL = document.getElementById('ipnBaseUrl').value;
const idPedido = document.getElementById('pedidoId').value;
let denunciaStatus = document.getElementById('pedidoStatus').value;

function alterarStatusDenuncia(status){
  pedidoStatus = status;
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST",
    BASE_URL + "/controller/PedidoController.php?action=updateStatus", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onload = function() {
    location.reload();
  }
  
  xhttp.send("status=" + encodeURIComponent(status) + "&idPedido=" + encodeURIComponent(idPedido));
}


