<?php
require('../classes/User.php');
require_once('../classes/Database.php');


//    class Register {
//        static public function login(){
            session_start();
            $username = $_POST['Pseudo'] ;
            $password = $_POST['Password'] ;
            $secondPassword = $_POST['PasswordTwice'] ;
            echo $secondPassword . "<br><hr>";
            echo $password . "<br><hr>";
            $email = $_POST['Email'] ;
            $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
            $user = new user($username,$email,$password,'','');
            if($secondPassword == $password) {
                if ($user->CheckUser() == true) {$databaseBaptiste->InsertUser($user);} else {
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
//            else {echo '<meta http-equiv="refresh" content="0;url='. "/Register" .'" />';}
//else {

//}



//    require_once('classes/User.php');
//    require_once('classes/Database.php');
//    session_start();
//    //session_start();
//    //if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    //    header("location: index.php");
//    //    exit;
//    //}
//
//    //    echo $_POST['submit'] . '<br><hr>';
//    $username = $_POST['username'] ;
//    $password = $_POST['password'] ;
//
//    $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
//    $user = new user('','',$username,'',$password,'','');
//    $databaseBaptiste->Login($user);
//
////
//    }
//    }
//
//    Register::login();
//    Register::login();
?>
