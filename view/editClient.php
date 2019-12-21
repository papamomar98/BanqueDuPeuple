<?php
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once  '../model/Client.php';

echo"
<form method=\"POST\" action=\"../controller/clientController.php\">
    <table class=\"tab_complet\">
        <tr>
           <td class=\"formul_tab\"><input type=\"number\"  placeholder=\"TELEPHONE\" name=\"tel\" id=\"tel\" class=\"champsNewC\" required/></td>
        </tr>
         <tr>
           <td class=\"formul_tab\"><input type=\"submit\"  value=\"Valider\" name=\"modifier\" class=\"btnDeconnexion\"></td>
        </tr>
    </table>
</form>";


if(isset($_GET['setClient'])) {
    if ($_GET['setClient'] == 0) {
        echo "<span style='color:red' class='span'>Erreur lors de la modification</span>";
    }
}
    if(isset($_GET['ok'])) {
    if ($_GET['ok'] == 0) {
        echo "<span style='color:red' class='span'>Ce client n'existe pas</span>";
    } else {
        $array = new Client();
        $client = $array->verifierTel($_GET['tel']);
        $nomC = $client['nom'];
        $prenomC = $client['prenom'];
        $telC = $client['tel'];
        $adresseC = $client['adresse'];
        $id = $client['id'];

        echo "<br><br>

   
            
            <form method=\"POST\" action=\"../controller/clientController.php\">
                <fieldset class=\"formulaire\">
                    <legend class=\"legendForm2_IndexOp\">Modification Client</legend><br>
                         <table class=\"tab_complet\">
                                <tr>
                                        <td><span style='color:#ff40f0' class='span'>INFO CLIENT</span></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  value=\"NOM: $nomC\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"   value=\"PRENOM: $prenomC\" class=\"infoText\" readonly></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  value=\"TEL: $telC\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"   value=\"ADRESSE: $adresseC\" class=\"infoText\" readonly></td>
                                </tr>
                                <tr>
                                    <td class=\"formul_tab\"><input type=\"text\" placeholder=\"NOUVEAU NOM\" name=\"nom\" id=\"nom\" class=\"champsNewC\" required/></td>
                                    <td class=\"formul_tab\"><input type=\"text\" placeholder=\"NOUVEAU PRENOM\" name=\"prenom\" id=\"prenom\" class=\"champsNewC\" required/></td>
                                </tr>
                                <tr>
                                     <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"NOUVEAU ADRESSE\" name=\"adresse\" id=\"adresse\" class=\"champsNewC\" required/></td>
                                     <td class=\"formul_tab\"><input type=\"number\"  placeholder=\"NOUVEAU TELEPHONE\" name=\"tel\" id=\"tel\" class=\"champsNewC\" required/></td>
                                 </tr>
                                 <tr>
                                     <td class=\"formul_tab\"><input type=\"submit\"  value=\"Modification\" name=\"update\" class=\"btnDeconnexion\"></td>
                                </tr>
                                <tr>
                                     <td class=\"formul_tab\"><input type=\"tex\" name=\"id\" value=\"$id\" id=\"id\" class=\"champsNewC\" hidden/></td>
                                </tr>
                         </table>
                 </fieldset>
            </form><br><br>";
    }
}
?>

<?php include "../footer.php";?>

