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
?>

<form id='ForgetPassword' action="/Controllers/controllerForgetPassword.php" method="POST">
    <label for="inputEmailForgetPassword" >Saisissez-vôtre adresse mail</label>
    <input id="inputEmailForgetPassword" name='email' type='text'>
    <button>Envoyer</button>
    <?php
    if (isset($_SESSION['MailSend']) && $_SESSION['MailSend'] == 'whynot') {
        echo '<p>' . 'Un email avec un nouveau mot de passe vient d\'être envoyé 
        si ' . " l'adresse" . ' email existe.' . '</p>';
        unset($_SESSION['MailSend']);
    } ?>
</form>
