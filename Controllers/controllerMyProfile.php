<?php
require_once('../classes/User.php');
require_once('../classes/Database.php');
session_start();


$newPassword = $_POST['ChangeP'] ;
$newEmail= $_POST['ChangeE'];
$user = $_SESSION['user'];
//echo 'Change Mot de passe ';
//print_r($_SESSION['user']);

$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362', 'baptistesevilla_projetweb');
$databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));
$databaseBaptiste->updateEmail($user->getId(), $newEmail);
?>