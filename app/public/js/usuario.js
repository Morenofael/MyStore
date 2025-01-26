const BASE_URL = document.getElementById('ipnBaseUrl').value;
const idUsuario = document.getElementById('ipnIdUsuario').value;
const filePfp = document.getElementById('filePfp');
const selSituacao = document.getElementById('selSituacao');
filePfp.addEventListener("change", ()=>salvarFoto());
selSituacao.addEventListener("change", ()=>mudarSituacao());

function salvarFoto() {
    let files = filePfp.files;
    if(files.length>0){
        let file = files[0];
        caminhoFoto = file.name;
        var formData = new FormData();
        formData.append("file[]", file);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST",
            BASE_URL + "/controller/UsuarioController.php?action=insertAlterPfp", true);
        xhttp.onload = function() {
            location.reload();
        }

        xhttp.send(formData);
    }else{
        alert("Selecione um arquivo");
    }

}

function mudarSituacao(){
    var formData = new FormData();
    formData.append("situacao", selSituacao.value);
    formData.append("id", idUsuario);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST",
            BASE_URL + "/controller/UsuarioController.php?action=alterSituacao", true);
        xhttp.onload = function() {
        }

        xhttp.send(formData);
}
