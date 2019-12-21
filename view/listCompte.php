<?php
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once '../model/Compte.php';
require_once '../model/Client.php';

echo "<br>";
echo "<span style='color:#5d1381' class='span'>LISTE DES COMPTES DES DIFFERENTS CLIENTS</span>";


if(isset($_GET['okCompte']) ) {
    if ($_GET['okCompte'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Compte ajouté avec succès</span></marquee>";
    }
}


if(isset($_GET['setCompte']) ) {
    if ($_GET['setCompte'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Compte Modifié avec succès</span></marquee>";
    }
}

if(isset($_GET['delCompte']) ) {
    if ($_GET['delCompte'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Compte Supprimé avec succès</span></marquee>";
    }
}
?><br>
<a href="addCompte.php"><button class="btnDeconnexion">Ajouter</button></a>
<a href="editCompte.php" class="nav-link"><button class="btnDeconnexion">MODIFIER</button></a>
<a href="deleteCompte.php" class="nav-link"><button class="btnDeconnexion">SUPPRIMER</button></a>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th>NUMERO</th>
        <th>SOLDE</th>
        <th>NOM CLIENT</th>
        <th>PRENOM CLIENT</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $array = new Compte();
    $vente = $array->getAll();

    $array2 = new Client();
    for ($i = 0; $i<sizeof($vente); $i++)
    {
        $id = $vente[$i]['client'];
        $client = $array2->getClientById($id);
        //var_dump($client[$i]['id']);
        echo'<tr>
                        <td class="formul_tab">'.$vente[$i]['numero'].'</td>
                        <td class="formul_tab">'.$vente[$i]['solde'].'</td>
                        <td class="formul_tab">'.$client['nom'].'</td>
                        <td class="formul_tab">'.$client['prenom'].'</td>

              </tr>';
    }
    ?>
    </tbody>
</table><br><br>

<?php include "../footer.php";?>

