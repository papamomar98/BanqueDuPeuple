<?php
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once  '../model/Client.php';
require_once  '../model/Compte.php';


echo"
<form method=\"POST\" action=\"../controller/compteController.php\">
    <table class=\"tab_complet\">
        <tr>
           <td class=\"formul_tab\"><input type=\"number\"  placeholder=\"TELEPHONE\" name=\"tel\" id=\"tel\" class=\"champsNewC\" required/></td>
        </tr>
         <tr>
           <td class=\"formul_tab\"><input type=\"submit\"  value=\"Valider\" name=\"modifier\" class=\"btnDeconnexion\"></td>
        </tr>
    </table>
</form>";

if(isset($_GET['setCompte'])) {
    if ($_GET['setCompte'] == 0) {
        echo "<span style='color:red' class='span'>Erreur lors de la modification</span>";
    }
}

if(isset($_GET['ok'])) {
    if ($_GET['ok'] == 0) {
        echo "<span style='color:red' class='span'>Ce client n'existe pas</span>";
    } else {
        $array = new Client();
        $client = $array->verifierTel($_GET['tel']);
        $nom = $client['nom'];
        $prenom = $client['prenom'];
        $tel = $client['tel'];
        $id = $client['id'];

        $array1 = new Compte();
        $compte = $array1->getOneCompte($id);
        $solde = $compte['solde'];
        $numero = $compte['numero'];



        echo "<br><br>
                                

   
            
            <form method=\"POST\" action=\"../controller/compteController.php\">
                <fieldset class=\"formulaire\">
                    <legend class=\"legendForm2_IndexOp\">Modification Compte</legend><br>
                         <table class=\"tab_complet\">
                                <tr>
                                        <td><span style='color:#ff40f0' class='span'>INFO CLIENT</span></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"NOM: $nom\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"PRENOM: $prenom\" class=\"infoText\" readonly></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"TEL: $tel\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"  placeholder=\"Solde\" value=\"SOLDE: $solde\" class=\"infoText\" readonly></td>
                                </tr>
                                
                              <tr>
                                 <td class=\"formul_tab\"><input type=\"text\" placeholder=\"NOUVEAU SOLDE\" name=\"solde\" id=\"solde\" class=\"champsNewC\"></td>
                              </tr>
                              <tr>
                                  <td class=\"formul_tab\"><input type=\"submit\" value=\"Modification\" name=\"update\" class=\"btnDeconnexion\"></td>
                             </tr>
                                <tr>
                                     <td class=\"formul_tab\"><input type=\"text\" name=\"numero\" value=\"$numero\" id=\"numero\" class=\"champsNewC\" hidden/></td>
                                </tr>
                         </table>
                 </fieldset>
            </form><br><br>";
    }
}
?>

<?php include "../footer.php";?>

