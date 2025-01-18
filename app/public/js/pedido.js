const BASE_URL = document.getElementById('ipnBaseUrl').value;
const selEndereco = document.getElementById('selEndereco') ? document.getElementById('selEndereco') : null;
const fileComprovante = document.getElementById('fileComprovante') ? document.getElementById('fileComprovante'): null;
const btnSalvarEndereco = document.getElementById('btnSalvarEndereco');
const btnSalvarComprovante = document.getElementById('btnSalvarComprovante');
const idPedido = document.getElementById('pedidoId').value;
const statusDisplaySpan = document.querySelector('#status-display > span')
let idEnderecoEntrega = document.getElementById('idEnderecoEntrega').value;
let caminhoComprovante = document.getElementById('caminhoComprovante').value;
let pedidoStatus = document.getElementById('pedidoStatus').value;

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
        caminhoComprovante = file.name;
        var formData = new FormData();
        formData.append("file[]", file);
        formData.append("idPedido", idPedido);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST",
            BASE_URL + "/controller/PedidoController.php?action=updateCaminhoComprovante", true);
        xhttp.onload = function() {
            verificarCampos();
            alterarStatusPedido('NV')
        }

        xhttp.send(formData);
        location.reload();
    }else{
        alert("Selecione um arquivo");
    }

}

function alterarStatusPedido(status){
  pedidoStatus = status;
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST",
    BASE_URL + "/controller/PedidoController.php?action=updateStatus", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onload = function() {
    verificarCampos();
  }
  
  xhttp.send("status=" + encodeURIComponent(status) + "&idPedido=" + encodeURIComponent(idPedido));
}

function statusPedidoEnumToString(status){
  switch(status){
    case 'AI':
      return 'Aguardando Informações';
      break;
    case 'NV':
      return 'Não visto pelo vendedor';
      break;
    case 'P':
      return 'Em preparo';
      break;
    case 'ENV':
      return 'Enviado para entrega';
      break;
    case 'ENT':
      return 'Entregue';
      break;
    default:
      return '404';
      break;
  }
}

function verificarCampos(){
  if(idEnderecoEntrega && selEndereco){
    selEndereco.setAttribute("disabled", "disabled");
    btnSalvarEndereco.setAttribute("disabled", "disabled");
    selEndereco.classList.add("mouse-not-allowed");
    btnSalvarEndereco.classList.add("mouse-not-allowed");
    if(!caminhoComprovante){
      fileComprovante.removeAttribute("disabled");
      btnSalvarComprovante.removeAttribute("disabled");
    }
  }
  if(caminhoComprovante && fileComprovante){
    fileComprovante.setAttribute("disabled", "disabled");
    btnSalvarComprovante.setAttribute("disabled", "disabled");
    fileComprovante.classList.add("mouse-not-allowed");
    btnSalvarComprovante.classList.add("mouse-not-allowed");
  }
  statusDisplaySpan.innerHTML = "Status do pedido: " + statusPedidoEnumToString(pedidoStatus);
}

verificarCampos();
