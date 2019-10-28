<?php
require_once ('Models/RequireAll.php');


            session_start();
            $username = $_POST['Pseudo'] ;
            $password = $_POST['Password'] ;
            $secondPassword = $_POST['PasswordTwice'] ;
            echo $secondPassword . "<br><hr>";
            echo $password . "<br><hr>";
            $email = $_POST['Email'] ;
            $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
            $user = new User($username,$email,$password,'','');
            if($secondPassword == $password) {
                if ($user->CheckUser() == true) {
                    $databaseBaptiste->InsertUser($user);
//                    $databaseBaptiste->Login($user);
                } else {
                    header( 'Location: /Register' ) ;
                    exit();
                }
            } else {
                 if(isset($_SESSION['Probleme'])){ $_SESSION['Probleme'] .=',SecondPassword';} else {$_SESSION['Probleme'] = "SecondPassword";}
                 echo $_SESSION['Probleme'];
                 $user->CheckUser();
                header( 'Location: /Register' ) ;
                exit();
            }
?>
