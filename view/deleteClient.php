
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
<td class=\"formul_tab\"><input type=\"submit\"  value=\"Valider\" name=\"supprimer\" class=\"btnDeconnexion\"></td>
</tr>
</table>
</form>";


if(isset($_GET['delClient'])) {
    if ($_GET['delClient'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Erreur lors de la supression</span></marquee>";
    }
}
if(isset($_GET['ok'])) {
    if ($_GET['ok'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Ce client n'existe pas</span></marquee>";
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
        <legend class=\"legendForm2_IndexOp\">Suppression Client</legend><br><br>
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
                                </tr><br>
                <table>
                    <tr>
                        <td class=\"formul_tab\"><input type=\"submit\"  placeholder=\"Suppression\" name=\"delete\" id=\"delete\" class=\"btnDeconnexion\"></td>
                    </tr>
                    <tr>
                        <td class=\"formul_tab\"><input type=\"text\"  value=\"$id\" name=\"id\"  hidden></td>
                    </tr>
                </table>
            </table>
        </fieldset>
        </form><br><br>


        ";



    }
}
?>

<?php include "../footer.php";?>

