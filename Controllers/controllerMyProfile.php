<?php
require_once('../classes/User.php');
require_once('../classes/Database.php');
session_start();


$password = $_POST['hachek'] ;
$user = $_SESSION['user'];
//echo 'Change Mot de passe ';
//print_r($_SESSION['user']);


echo $password;
print_r($user);

$user->SetPassword(454545);

$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362', 'baptistesevilla_projetweb');
$databaseBaptiste->insertNewPassword($password);

?>