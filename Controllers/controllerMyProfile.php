<?php
require_once ('Models/RequireAll.php');
//require_once('../classes/User.php');
//require_once('../classes/Database.php');
session_start();


$newPassword = $_POST['ChangeP'] ;
$newEmail= $_POST['ChangeE'];
$user = $_SESSION['user'];
//echo 'Change Mot de passe ';
//print_r($_SESSION['user']);

$databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
$databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));
$databaseBaptiste->updateEmail($user->getId(), $newEmail);
?>