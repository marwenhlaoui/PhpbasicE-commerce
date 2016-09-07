<?php
//On demarre les sessions
session_start();
$connect = true;
/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
$fileconf = "app/app.config";
if (file_exists($fileconf)) {
	$env = json_decode(file_get_contents($fileconf)); 
	$base= mysqli_connect($env->host, $env->root, $env->pass, $env->db);
}else{
    $connect = false;
}
 
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
	$connect = false;
}
 

if ($connect == false) { 
    header('location:mysql.php');
}
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