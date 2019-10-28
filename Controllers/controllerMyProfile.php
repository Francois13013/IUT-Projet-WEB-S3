<?php
require_once ('Models/RequireAll.php');

//require_once('../classes/User.php');
//require_once('../classes/Database.php');


//$newPassword = $_POST['ChangeP'] ;
//$newEmail= $_POST['ChangeE'];
//unset($_POST['ChangeP']);
//unset($_POST['ChangeE']);

//echo 'Change Mot de passe ';
//print_r($_SESSION['user']);

//print_r($user);




function StatusToString(){
    if($_SESSION["Status"] == 1){
        return 'Admin';
    } else {
        return 'Utilisateur standard';
    }
}



function ShowInfo(){

    $html = '<div>';
    $html .= '<p>Pseudo</p>';
    $html .= '<p>' . $_SESSION["Surname"] . '</p>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<p>Email</p>';
    $html .= '<p>' . $_SESSION["Email"] . '</p>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<p>Status</p>';
    $html .= '<p>' . StatusToString() . '</p>';
    $html .= '</div>';
    echo $html;
}

function ChangePassword()
{
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
    $newPassword = $_POST['ChangePassword'];
    $user->setPassword($newPassword);
    if ($user->CheckPassword() == true) {
        $databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));;
        $_SESSION['user'] = $user;
    }
}


function ChangeEmail(){
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
    $newEmail = $_POST['ChangeEmail'];
    $user->setEmail($newEmail);
    if ($user->CheckEmail() == true || $user->CheckEmailHost($newEmail) == true) {
        $databaseBaptiste->updateEmail($user->getId(), $newEmail);
        $_SESSION['user'] = $user;
    }
}
?>