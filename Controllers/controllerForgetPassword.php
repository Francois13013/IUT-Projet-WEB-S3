<?php
/**
 * Controller de la view ForgetPassword
 * Recupère les informations dans POST et les traites
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

require_once 'Models/RequireAll.php';

session_start();

/**
 * Crée un mot de passe aléatoire
 *
 * @param $length Taille du mot de passe renvoyé
 *
 * @return string Mot de passe
 */
function randPassword($length)
{
    $passgen = null;
    for ($i = 1; $i<$length; ++$i) {
        $passgen .= chr(rand(46, 125));
    }
    return $passgen;
}

$email = $_POST['email'];
$databaseBaptiste = new Database(
    HOST,
    USER,
    PASSWORD,
    TABLENAME
);
if ($databaseBaptiste->CheckEmail($email) == 1) {
    $newPass = randPassword('10');
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
