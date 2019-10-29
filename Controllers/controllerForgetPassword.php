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

require_once 'Models/RequireAll.php';

session_start();

/**
 * Process any throw tags that this function comment has.
 *
 * @return string
 */
function randPassword()
{
    $passgen = null;
    for ($i = 1; $i<10; ++$i) {
        $passgen .= chr(rand(46, 125));
    }
    return $passgen;
}

$email = $_POST['email'];
$databaseBaptiste = new Database(
    'mysql-francois.alwaysdata.net',
    'francois_project',
    '0621013579',
    'francois_user'
);
if ($databaseBaptiste->CheckEmail($email) == 1) {
    $newPass = randPassword();
    mail(
        $email,
        'Changement de mot de passe',
        'Voici votre nouveau mdp ' . $newPass
    );
    $databaseBaptiste->updatePassword($email, sha1($newPass));
}
$_SESSION['MailSend'] = "whynot";
header('Location: /ForgetPassword');
exit();
