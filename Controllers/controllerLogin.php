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

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    unset($_POST['username']);
    unset($_POST['password']);
}

$databaseBaptiste = new Database(
    'mysql-francois.alwaysdata.net',
    'francois_project',
    '0621013579',
    'francois_user'
);
$user = new User($username, '', $password, '', '');
$databaseBaptiste->login($user);



