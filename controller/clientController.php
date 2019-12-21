<?php
session_start();
require_once '../model/DB.php';
require_once  '../model/Client.php';

if (isset($_POST['ajouter']))
{
    extract($_POST);

    $ajout = new Client();
    $verif = $ajout->verifierTel($tel);
    //$nbClient = $verif->rowCount();

    if(empty($verif))
    {
        $client = $ajout->insert($nom, $prenom, $adresse, $tel);
        echo $nom;
        // echo $etat;
        //var_dump($client);
        //die();
        if ($client > 0) {
            header("location:../view/accueil.php?okClient=1");
        } else {
            header("location:../view/addClient.php?okClient=0");
        }
    }else{
        header("location:../view/addClient.php?existTel=0");
    }
}


if(isset($_POST['modifier'])) {
    extract($_POST);
    $ajout = new Client();
    $verif = $ajout->verifierTel($tel);
//$nbClient = $verif->rowCount();
//var_dump($verif);
//die();
    if (empty($verif)) {
        header("location:../view/editClient.php?ok=0&tel=" . $tel);

    } else {
        header("location:../view/editClient.php?ok=1&tel=" . $tel);

    }
}

if (isset($_POST['update'])) {
    extract($_POST);
    $client = new Client();
    $modifie = $client->update($id, $nom, $prenom, $adresse, $tel);

    //var_dump($modifie); echo $id; die();
    if ($modifie > 0) {
        header("location:../view/accueil.php?setClient=1");
    } else {
        header("location:../view/editClient.php?setClient=0");
    }
}

if(isset($_POST['supprimer'])) {
    extract($_POST);
    $ajout = new Client();
    $verif = $ajout->verifierTel($tel);
//$nbClient = $verif->rowCount();
//var_dump($verif);
//die();
    if (empty($verif)) {
        header("location:../view/deleteClient.php?ok=0&tel=" . $tel);

    } else {
        header("location:../view/deleteClient.php?ok=1&tel=" . $tel);

    }
}

if (isset($_POST['delete'])){
    extract($_POST);
    $client = new Client();
    $supprimer = $client->delete($id);
    //var_dump($supprimer);  var_dump($id);die;///
    if ($supprimer > 0) {
        header("location:../view/accueil.php?delClient=1");
    } else {
        header("location:../view/deleteClient.php?delClient=0");
    }
}
