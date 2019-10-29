<?php

/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * PHP VERSION 7.2.22
 *
 * @category   JeSaisPas
 * @package    WordPress
 * @subpackage Mytheme
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
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
