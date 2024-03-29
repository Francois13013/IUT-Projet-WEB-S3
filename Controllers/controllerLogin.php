<?php
/**
 * Controller de la view Index
 * Traite les informations de connexion du formulaire
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

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    unset($_POST['username']);
    unset($_POST['password']);
}

$databaseBaptiste = new Database(
    HOST,
    USER,
    PASSWORD,
    TABLENAME
);
$user = new User($username, '', $password, '', '');
$databaseBaptiste->login($user);



