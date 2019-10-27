<?php

require_once('../classes/Database.php');
session_start();

function RandPassword(){
    $passgen = NULL;
    for($i = 1; $i<10; ++$i) {
        $passgen .= chr(rand(46, 125));
    }
    return $passgen;
}

$email = $_POST['email'];
$databaseBaptiste = new database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
if ($databaseBaptiste->CheckEmail($email) == 1) {
    $newPass = RandPassword();
    mail($email, 'Changement de mot de passe', 'Voici votre nouveau mdp ' . $newPass);
    $databaseBaptiste->updatePassword($email,sha1($newPass));
}
//    if (isset($email)) {
//        header('Location: /');
$_SESSION['MailSend'] = "whynot";
header( 'Location: /ForgetPassword' ) ;
exit();
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