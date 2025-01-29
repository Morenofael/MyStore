const BASE_URL = document.getElementById('ipnBaseUrl').value;
const idDenuncia = document.getElementById('hddIdDenuncia').value;
const selStatusDenuncia = document.getElementById('selStatusDenuncia');

selStatusDenuncia.addEventListener("change",()=>alterarStatusDenuncia());

function alterarStatusDenuncia(){
  var formData = new FormData();
    formData.append("status", selStatusDenuncia.value);
    formData.append("id", idDenuncia);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST",
            BASE_URL + "/controller/DenunciaController.php?action=alterStatus", true);
        xhttp.onload = function() {
        }

        xhttp.send(formData);
}


