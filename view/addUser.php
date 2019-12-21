<?php
include "../header.php";
include "../topbar.php";

if(isset($_GET['existUser']))
{
    if ($_GET['existUser'] == 0) {
        echo "<marquee><span style='color:red' class='span'>Login déjà utilisé dsl!!</span></marquee>";
    }
}
if (isset($_GET['ok']) )
{
    if ($_GET['ok'] == 0)
    {
        echo "<marquee><span style='color: #ff253a' class='span'>Erreur lors de l'ajout de l'utilisateur</span></marquee>";
    }
}
?><br><br>
<form method="POST" action="../controller/userController.php">
    <fieldset class="formulaire">
        <legend class="legendForm2_IndexOp">Ajout utilisateur</legend>
        <table class="tab_complet">
            <tr>
                <td class="formul_tab"><input type="text" placeholder="NOM" name="nom" id="nom" class="champsNewC" required/></td>
                <td class="formul_tab"><input type="text" placeholder="PRENOM" name="prenom" id="prenom" class="champsNewC" required/></td>
            </tr>
            <tr>
                <td class="formul_tab"><input type="text" align="center" placeholder="EMAIL" name="login" id="login" class="champsNewC" required/></td>
                <td class="formul_tab"><input type="text" align="center" placeholder="PASSWORD" name="password" id="password" class="champsNewC" required/></td>
            </tr>
            <tr>
                <td class="formul_tab"><input type="submit" align="center" value="Ajouter" name="ajouter" class="btnDeconnexion"></td>
            </tr>
        </table>
    </fieldset>
</form><br><br>

<?php include "../footer.php";?>
