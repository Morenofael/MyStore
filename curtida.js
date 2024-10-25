function curtir(button) {
    var idProduto = button.getAttribute('data-idProduto');
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", 
                "http://localhost:8080/app/controller/CurtidaController.php?action=save");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        var json = xhttp.responseText;
        if(json == "")
            alert("1");
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
        console.log();
        console.log(JSON.parse(json).some(item => item.produto.id === idProduto));
    }
    
    xhttp.send();
}