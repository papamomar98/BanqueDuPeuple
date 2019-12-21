<?php
include "../header.php";
include "../topbar.php";

if(isset($_GET['existTel']))
{
    if ($_GET['existTel'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Ce numéro de téléphone est déjà attribué à un client</span></marquee>";
    }
}
if(isset($_GET['ok']))
{
    if ($_GET['ok'] == 0) {
        echo "<marquee><span style='color: #ff253a' class='span'>Erreur lors de l'ajout du client</span></marquee>";
    }
}

if(isset($_GET['okClient']) ) {
    if ($_GET['okClient'] == 0)
    {
        echo "<marquee><span style='color:red' class='span'>Erreur lors de l'ajout du client</span></marquee>";
    }
}
?><br><br>

<a href="editClient.php" class="nav-link"><button class="btnDeconnexion">MODIFIER</button></a>
<a href="deleteClient.php" class="nav-link"><button class="btnDeconnexion">SUPPRIMER</button></a>

<form method="POST" action="../controller/clientController.php">
    <fieldset class="formulaire">
        <legend class="legendForm2_IndexOp">Ajout client</legend>
        <table class="tab_complet">
            <tr>
                <td class="formul_tab"><input type="text" placeholder="NOM" name="nom" id="nom" class="champsNewC" required/></td>
                <td class="formul_tab"><input type="text" placeholder="PRENOM" name="prenom" id="prenom" class="champsNewC" required/></td>
            </tr>
            <tr>
                <td class="formul_tab"><input type="text"  placeholder="ADRESSE" name="adresse" id="adresse" class="champsNewC" required/></td>
                <td class="formul_tab"><input type="number"  placeholder="TELEPHONE" name="tel" id="tel" class="champsNewC" required/></td>
            </tr>
            <tr>
                <td class="formul_tab"><input type="submit" align="center" value="Ajouter" name="ajouter" class="btnDeconnexion"></td>
            </tr>
        </table>
    </fieldset>
</form>
<br><br>


<?php include "../footer.php";?>
