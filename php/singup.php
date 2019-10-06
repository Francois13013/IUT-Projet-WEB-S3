<?php
session_start();
require_once('user.php');
require_once('database.php');

    $firstName =  $_POST['FirstName'];
    $lastName =  $_POST['LastName'];
    $surname =  $_POST['Surname'];
    $email = $_POST['Email'];
    $password  = $_POST['Password'];
    $passwordTwice  = $_POST['PasswordTwice'];
    $checkbox  = $_POST['checkbox'];
    $submit  = $_POST['submit'];

    $newUser = new user($firstName,$lastName,$surname,$email,$password,'','3');
    if($password != $passwordTwice || $checkbox == NULL || $newUser->CheckUser() == false){
        header('Location: /singup.php');
        exit();
    } else {
        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
        $newUser->setStatut('2');
        $newUser->setPassword(sha1($newUser->getPassword()));
        $databaseBaptiste->InsertUser($newUser);
    }
    ?>