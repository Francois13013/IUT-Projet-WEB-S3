<?php
/**
 * Controller de la view MyProfile
 * Fait le lien entre les boutons et la base de donnée et traite
 * les informations mis en "POST"
 *
 * PHP VERSION 7.2.22
 *
 * @category   Controller
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @author     Florent Reymond <Florent.Raymond@etu.univ-amu.fr>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require_once 'Models/RequireAll.php';

/**
 * Convertir le status en écriture compréhensible par l'utilisateur
 *
 * @return string
 */
function stautsToString()
{
    if ($_SESSION["Status"] == 1) {
        return 'Admin';
    } else {
        return 'Utilisateur standard';
    }
}


/**
 * Affiche les informations de la personne connecté
 *
 * @return void
 */
function showInfo()
{

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
    $html .= '<p>' . stautsToString() . '</p>';
    $html .= '</div>';
    echo $html;
}

/**
 * Traite les informations du formulaire et appel un changement de mot de passe
 * si le nouveau mot de passe correspond au critère de sécurité
 *
 * @return void
 */
function changePassword()
{
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    $newPassword = $_POST['ChangePassword'];
    $user->setPassword($newPassword);
    if ($user->CheckPassword() == true) {
        $databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));;
        $_SESSION['user'] = $user;
    }
}

/**
 * Traite les informations du formulaire et appel un changement adresse mail
 * si le nouveau mot de passe correspond au critère attendu
 *
 * @return void
 */
function changeEmail()
{
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    $newEmail = $_POST['ChangeEmail'];
    $user->setEmail($newEmail);
    if ($user->CheckEmail() == true || $user->CheckEmailHost($newEmail) == true) {
        $databaseBaptiste->updateEmail($user->getId(), $newEmail);
        $_SESSION['user'] = $user;
    }
}
