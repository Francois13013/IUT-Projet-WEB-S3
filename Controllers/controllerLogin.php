<?php

require_once ('../Models/RequireAll.php');

session_start();

//require_once($_SERVER["DOCUMENT_ROOT"] . 'classes/User.php');

//require_once('../classes/User.php');
//require_once($_SERVER["DOCUMENT_ROOT"] . 'classes/Database.php');
session_start();

//session_start();
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: index.php");
//    exit;
//}

//    echo $_POST['submit'] . '<br><hr>';
if(isset($_POST['username'],$_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    unset($_POST['username']);
    unset($_POST['password']);
}

$databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
$user = new User($username,'',$password,'','');
//echo $user;
$databaseBaptiste->Login($user);



?>