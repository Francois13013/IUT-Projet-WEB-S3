<?php
/**
 * Controller de la view Register
 * Traite le formulaire d'inscription
 * Concatène les erreurs de façon interpretable par une fonction javascript
 * (../Public/js/RedBorder.js) dans une string.
 *
 * PHP VERSION 7.2.22
 *
 * @category   Controller
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */
require_once '../Models/RequireAll.php';

session_start();
$username = $_POST['Pseudo'] ;
$password = $_POST['Password'] ;
$secondPassword = $_POST['PasswordTwice'] ;
$email = $_POST['Email'] ;
$databaseBaptiste = new Database(
    HOST,
    USER,
    PASSWORD,
    TABLENAME
);

if (!empty($_POST['Pseudo']) || !empty($_POST['Password'])
    || !empty($_POST['PasswordTwice']
    || !empty($_POST['Email']))) {
    $user = new User($username, $email, $password, '', '');
    if (isset($_POST['checkbox'])) {
        if ($secondPassword == $password) {
            if ($user->checkUser() == true) {
                $databaseBaptiste->insertUser($user);
            } else {
                header('Location: /Register');
                exit();
            }
        } else {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .= ',SecondPassword';
            } else {
                $_SESSION['Probleme'] = "SecondPassword";
            }
            echo $_SESSION['Probleme'];
            $user->checkUser();
            header('Location: /Register');
            exit();
        }
    } else {
        $_SESSION['inputError'] = 'Merci d\'accepter les conditions d\'utilisations.';
        header('Location: /Register');
        exit();
    }
}

