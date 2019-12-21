<?php
session_start();
require_once '../model/DB.php';
require_once  '../model/User.php';

if(isset($_GET['deconnexion']))
{
    session_unset();
    $_SESSION = array();
    header("location:../index.php");
}

if(isset($_POST['username']) && isset($_POST['pass']))
{

$login = $_POST['username'];
$password = $_POST['pass'];

    $_SESSION['login'] = $_POST['username'];

$userdb = new User();
$user = $userdb->login($login, $password);
//var_dump($user); die();
$nbconnect = $user->rowCount();

if($nbconnect !=  0)
{
$u = $user->fetchObject();

header("location:../view/accueil.php");
}else{
header("location:../index.php");
}
}


if (isset($_POST['ajouter']))
{
    extract($_POST);
    $ajout = new User();
    $verif = $ajout->verifUserByEmail($login);
    $nbUser = $verif->rowCount();

    // $nbUser = $user->rowCount();
    if ($nbUser == 0)
    {
        $user = $ajout->insert($nom, $prenom, $login, $password);
        if ($user > 0) {
            header("location:../view/accueil.php?ok=1");
        } else {
            header("location:../view/addUser.php?ok=0");
        }
    }else{
        header("location:../view/addUser.php?existUser=0");
    }
}

?>