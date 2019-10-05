<?php
include_once ('user.php');
include_once ('database.php');

    $firstName =  $_POST['FirstName'];
    $lastName =  $_POST['LastName'];
    $surname =  $_POST['Surname'];
    $email = $_POST['Email'];
    $password  = $_POST['Password'];
    $passwordTwice  = $_POST['PasswordTwice'];
    $checkbox  = $_POST['checkbox'];
    $submit  = $_POST['submit'];

    if(strlen($password) <= 6
        || strlen($password) > 14
        || strlen($surname) > 16
        || strlen($email)> 32
        || strlen($lastName)> 32
        || strlen($firstName > 32)
        || $password != $passwordTwice){
        header('Location: /singup.html');
        exit();
    } else {
        $newuser = new user($firstName,$lastName,$surname,$email,sha1($password),'','2');
        echo sha1($password);
        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
        $databaseBaptiste->InsertUser($newuser);
        echo 'et merce';
    }
    ?>