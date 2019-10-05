<?php
include_once ('user.php');
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}


    echo $_POST['submit'] . '<br><hr>';
    echo $_POST['username'] . '<br><hr>';
    echo $_POST['password'] . '<br><hr>';

//    $useroff = new user()
?>