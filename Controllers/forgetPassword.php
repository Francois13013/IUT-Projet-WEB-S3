<?php
//
//require_once ('classes/Database.php');
//
//class forgetPassword extends Controller
//{
//    public static function sendMail (){
//        session_start();
//
//        $email = $_POST['email'];
//        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362', 'baptistesevilla_projetweb');
//        if ($databaseBaptiste->CheckEmail($email) == 1)
//        {
//            mail($email, 'Changement de mot de passe', 'Voici votre nouveau mdp '. sha1(rand(1000000, 100000000)));
//            echo "email trouvé";
//        }
//
//        else
//            if (isset($email)) {
//                header('Location: /index.php');
//                exit();
//            }
//
//    }
//}
//
//forgetPassword::sendMail();
//
//?>