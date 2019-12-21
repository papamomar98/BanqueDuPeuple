
<?php
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once  '../model/Compte.php';
require_once  '../model/Client.php';


echo"
<form method=\"POST\" action=\"../controller/compteController.php\">
<table class=\"tab_complet\">
<tr>
<td class=\"formul_tab\"><input type=\"number\"  placeholder=\"TELEPHONE\" name=\"tel\" id=\"tel\" class=\"champsNewC\" required/></td>
</tr>
<tr>
<td class=\"formul_tab\"><input type=\"submit\"  value=\"Valider\" name=\"supprimer\" class=\"btnDeconnexion\"></td>
</tr>
</table>
</form>";


if(isset($_GET['delCompte'])) {
    if ($_GET['delCompte'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Erreur lors de la supression</span></marquee>";
    }
}
if(isset($_GET['ok'])) {
    if ($_GET['ok'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Ce client n'existe pas</span></marquee>";
    } else {
        $array = new Client();
        $client = $array->verifierTel($_GET['tel']);
        $idClient = $client['id'];
        $nom = $client['nom'];
        $prenom = $client['prenom'];


        $array1 = new Compte();
        $compte = $array1->getOneCompte($idClient);
       // var_dump($compte);
        //var_dump($client);
        $numero = $compte['numero'];
        $solde = $compte['solde'];
        /*var_dump($solde); var_dump($numero);
        echo $solde, $numero ;die();*/
        $id = $compte['id'];

        echo "<br><br>
        <form method=\"POST\" action=\"../controller/compteController.php\">
        <fieldset class=\"formulaire\">
        <legend class=\"legendForm2_IndexOp\">Suppression Compte</legend><br><br>
        <table>
                                <tr>
                                        <td><span style='color:#ff40f0' class='span'>INFO CLIENT</span></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"NOM: $nom\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"PRENOM: $prenom\" class=\"infoText\" readonly></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"NUMERO: $numero\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"SOLDE: $solde\" class=\"infoText\" readonly></td>
                                </tr><br>
                <table>
                    <tr>
                        <td class=\"formul_tab\"><input type=\"submit\"  placeholder=\"Suppression\" name=\"delete\" id=\"delete\" class=\"btnDeconnexion\"></td>
                    </tr>
                    <tr>
                        <td class=\"formul_tab\"><input type=\"text\"  value=\"$id\" name=\"id\"  hidden></td>
                    </tr>
                    <tr>
                        <td class=\"formul_tab\"><input type=\"text\"  value=\"$numero\" name=\"numero\"  hidden></td>
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

