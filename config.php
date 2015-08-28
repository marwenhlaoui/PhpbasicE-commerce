<?php
//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
$base= mysqli_connect("localhost", "root", "", "mywebdb");
 
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    die("Échec de la connexion :<br>".mysqli_connect_error());
    exit();
}

//Email du webmaster
$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://localhost/myweb/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';


if(isset($_GET['logout']) && ($_GET["logout"]== true)){
	session_unset ();
	session_destroy();
}
?>