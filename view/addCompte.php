<?php
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once  '../model/Client.php';

echo "<span style='color:#5d1381' class='span'>ENTREZ LE NUMERO DU CLIENT POUR LUI AJOUTER UN COMPTE</span>";

echo"
<form method=\"POST\" action=\"../controller/compteController.php\">
    <table class=\"tab_complet\">
        <tr>
           <td class=\"formul_tab\"><input type=\"number\"  placeholder=\"TELEPHONE\" name=\"tel\" id=\"tel\" class=\"champsNewC\" required/></td>
        </tr>
         <tr>
           <td class=\"formul_tab\"><input type=\"submit\"  value=\"Valider\" name=\"verifie\" class=\"btnDeconnexion\"></td>
        </tr>
    </table>
</form>";


if(isset($_GET['okCompte']) ) {
    if ($_GET['okCompte'] == 0)
    {
        echo "<marquee><span style='color:red' class='span'>Erreur lors de l'ajout du compte</span></marquee>";
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
        $adresse = $client['adresse'];
        $tel = $client['tel'];
        $id = $client['id'];

        echo "<br><br>

   
            
            <form method=\"POST\" action=\"../controller/compteController.php\">
                <fieldset class=\"formulaire\">
                    <legend class=\"legendForm2_IndexOp\">Ajout Compte</legend>
                         <table class=\"tab_complet\">
                                <tr>
                                        <td><span style='color:#ff40f0' class='span'>INFO CLIENT</span></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  value=\"NOM: $nom\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"   value=\"PRENOM: $prenom\" class=\"infoText\" readonly></td>
                                </tr>
                                <tr>
                                            <td class=\"formul_tab\"><input type=\"text\"  value=\"TEL: $tel\" class=\"infoText\" readonly></td>
                                            <td class=\"formul_tab\"><input type=\"text\"   value=\"ADRESSE: $adresse\" class=\"infoText\" readonly></td>
                                </tr>
                              <tr>
                                 <td class=\"formul_tab\"><input type=\"number\" placeholder=\"SOLDE\" name=\"solde\" id=\"solde\" class=\"champsNewC\" required/></td>
                              </tr>
                              <tr>
                                  <td class=\"formul_tab\"><input type=\"submit\" align=\"center\" value=\"Ajouter\" name=\"ajouter\" class=\"btnDeconnexion\"></td>
                             </tr>
                             
                            <tr>
                                  <td class=\"formul_tab\"><input type=\"text\"  value=\"$id\" name=\"client\"  hidden></td>
                            </tr>
                             
                             
                         </table>
                 </fieldset>
            </form>";
    }
}
?>
<br><br>
<a href="editCompte.php" class="nav-link"><button class="btnDeconnexion">MODIFIER</button></a>
<a href="deleteCompte.php" class="nav-link"><button class="btnDeconnexion">SUPPRIMER</button></a>

<?php include "../footer.php";?>
