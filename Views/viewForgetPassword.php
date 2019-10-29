<?php
/**
 * Verification de l'envoi du mail
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

    session_start();
if (isset($_SESSION['MailSend']) && $_SESSION['MailSend'] == 'whynot') {
    echo 'Mail envoyé si ' . " l'adresse" . ' email existe.';
}
?>
<form action="../Controllers/controllerForgetPassword.php" method="POST">
    <input name='email' type='text'>
    <button>Envoyer</button>
</form>
