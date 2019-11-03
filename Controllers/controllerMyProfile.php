<?php
/**
 * Controller de la view MyProfile
 * Fait le lien entre les boutons et la base de données et traite
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
function statutToString()
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
    $html .= '<p>E-mail</p>';
    $html .= '<p>' . $_SESSION["Email"] . '</p>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<p>Statut</p>';
    $html .= '<p>' . statutToString() . '</p>';
    $html .= '</div>';
    echo $html;
}

/**
 * Traite les informations du formulaire et appelle un changement de mot de passe
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
    if (!empty($_POST['ChangePassword'])) {
        $user->setPassword($newPassword);
        if ($user->CheckPassword() == true) {
            $databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));
            $_SESSION['user'] = $user;
        } else {
            $_SESSION['inputError'] = 'Le mot de passe doit être';
            $_SESSION['inputError'] .= ' supérieur à 8 caractères';
            $_SESSION['inputError'] .= ' et inférieur à 32 caractères.';
        }
    }
}

/**
 * Traite les informations du formulaire et appelle un changement adresse mail
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
    if (!empty($_POST['ChangeEmail'])) {
        $newEmail = $_POST['ChangeEmail'];
        $user->setEmail($newEmail);
        if ($user->CheckEmail() || $user->CheckEmailHost($newEmail)) {
            $databaseBaptiste->updateEmail($user->getId(), $newEmail);
            $_SESSION['user'] = $user;
        } else {
            $_SESSION['inputError'] = 'L\'adresse doit être standard';
            $_SESSION['inputError'] .= ' et l\'hébergeur ne doit pas être jetable.';
        }
    }
}
