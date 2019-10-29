<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * PHP VERSION 7.1
 *
 * @category   JeSaisPas
 * @package    WordPress
 * @subpackage Mytheme
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */
require_once '../Models/RequireAll.php';

session_start();
$username = $_POST['Pseudo'] ;
$password = $_POST['Password'] ;
$secondPassword = $_POST['PasswordTwice'] ;
$email = $_POST['Email'] ;
$databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
$user = new User($username, $email, $password, '', '');
if ($secondPassword == $password) {
    if ($user->checkUser() == true) {
        $databaseBaptiste->insertUser($user);
    } else {
        header('Location: /Register');
        exit();
    }
} else {
    if (isset($_SESSION['Probleme'])) {
        $_SESSION['Probleme'] .=',SecondPassword';
    } else {
        $_SESSION['Probleme'] = "SecondPassword";
    }
            echo $_SESSION['Probleme'];
            $user->checkUser();
            header('Location: /Register');
            exit();
}

