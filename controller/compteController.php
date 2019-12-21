<?php
session_start();
require_once '../model/DB.php';
require_once  '../model/Compte.php';
require_once  '../model/Client.php';
require_once  '../model/User.php';


$ajoutuser = new User();
$userId = $ajoutuser->getUserByEmail($_SESSION['login']);
$user = $userId['id'];

if(isset($_POST['verifie'])) {
    extract($_POST);
    $ajout = new Client();
    $verif = $ajout->verifierTel($tel);
//$nbClient = $verif->rowCount();
//var_dump($verif);
//die();
    if (empty($verif)) {
        header("location:../view/addCompte.php?ok=0&tel=" . $tel);

    } else {
        header("location:../view/addCompte.php?ok=1&tel=" . $tel);

    }
}

if (isset($_POST['ajouter']))
{
    extract($_POST);
    $ajout = new Compte();
    $num = $ajout->genererNumeroCompte();
    //var_dump($numero); die();
        $compte = $ajout->insert($solde, $num, $client, $user);
        //var_dump($compte); var_dump($client); var_dump($user); die();
        if ($compte > 0) {
            header("location:../view/listCompte.php?okCompte=1");
        } else {
            header("location:../view/addCompte.php?okCompte=0");
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
        header("location:../view/editCompte.php?ok=0&tel=" . $tel);

    } else {
        header("location:../view/editCompte.php?ok=1&tel=" . $tel);

    }
}

if (isset($_POST['update'])) {
    extract($_POST);
    $compte = new Compte();
    $modifie = $compte->update($numero, $solde);

    //var_dump($modifie); die();
    if ($modifie > 0) {
        header("location:../view/listCompte.php?setCompte=1");
    } else {
        header("location:../view/editCompte.php?setCompte=0");
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
        header("location:../view/deleteCompte.php?ok=0&tel=" . $tel);

    } else {
        header("location:../view/deleteCompte.php?ok=1&tel=" . $tel);

    }
}

if (isset($_POST['delete'])){
    extract($_POST);
    $compte = new Compte();
    $supprimer = $compte->delete($id, $numero);
    //var_dump($supprimer);var_dump($id);var_dump($numero); die;
    if ($supprimer > 0) {
        header("location:../view/listCompte.php?delCompte=1");
    } else {
        header("location:../view/deleteCompte.php?delCompte=0");
    }
}
