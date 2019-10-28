<?php

require_once ('../Models/RequireAll.php');

session_start();

if(isset($_POST['username'],$_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    unset($_POST['username']);
    unset($_POST['password']);
}

$databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
$user = new User($username,'',$password,'','');
$databaseBaptiste->Login($user);



