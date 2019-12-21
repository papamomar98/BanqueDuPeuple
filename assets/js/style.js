
function confirmer() {
    var nClient = document.getElementById("delete");
    var c = confirm("Voulez-vous vraiment supprimer ce client");
    if(c)
    {
        window.location.href="../controller/clientController.php?del=1&&client="+nClient.value;
    }
    else
    {
        window.location.href="../view/accueil.php";
    }
}

