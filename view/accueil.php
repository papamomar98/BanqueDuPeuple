<?php
session_start();
include "../header.php";
include "../topbar.php";
require_once '../model/DB.php';
require_once '../model/Client.php';
require_once '../model/Compte.php';

echo "<br><br>";
if(isset($_GET['ok']) ) {
    if ($_GET['ok'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Utilisateur ajouté avec succès</span></marquee>";
    }
}


if(isset($_GET['okClient']) ) {
    if ($_GET['okClient'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Client ajouté avec succès</span></marquee>";
    }
}

if(isset($_GET['delClient']) ) {
    if ($_GET['delClient'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Client Supprimé avec succès</span></marquee>";
    }
}

if(isset($_GET['setClient']) ) {
    if ($_GET['setClient'] == 1)
    {
        echo "<marquee><span style='color:#1e7e34' class='span'>Client Modifié avec succès</span></marquee>";
    }
}
echo "<br>";
echo "<span style='color:#5d1381' class='span'>LISTE DES CLIENTS</span>";

?><br>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>ADRESSE</th>
        <th>TELEPHONE</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $array = new Client();
    $arrayCompte = new Compte();
    $client = $array->getAll();
    for ($i = 0; $i<sizeof($client); $i++)
    {
        $compte = $arrayCompte->getComptetByIdClient($client[$i]['id']);
        //var_dump($client[$i]['id']);
        echo'<tr>
                        <td class="formul_tab">'.$client[$i]['nom'].'</td>
                        <td class="formul_tab">'.$client[$i]['prenom'].'</td>
                        <td class="formul_tab">'.$client[$i]['adresse']. '</td>
                        <td class="formul_tab">'.$client[$i]['tel']. '</td>
                 </tr>';
    }
    ?>
    </tbody>
</table><br><br>

<?php include "../footer.php";?>
