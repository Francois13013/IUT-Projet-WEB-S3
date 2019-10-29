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

/**
 * Process any throw tags that this function comment has.
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
 * Process any throw tags that this function comment has.
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
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function changePassword()
{
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_project',
        '0621013579',
        'francois_user'
    );
    $newPassword = $_POST['ChangePassword'];
    $user->setPassword($newPassword);
    if ($user->CheckPassword() == true) {
        $databaseBaptiste->updatePassword($user->getEmail(), sha1($newPassword));;
        $_SESSION['user'] = $user;
    }
}

/**
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function changeEmail()
{
    $user = $_SESSION['user'];
    $databaseBaptiste = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_project',
        '0621013579',
        'francois_user'
    );
    $newEmail = $_POST['ChangeEmail'];
    $user->setEmail($newEmail);
    if ($user->CheckEmail() == true || $user->CheckEmailHost($newEmail) == true) {
        $databaseBaptiste->updateEmail($user->getId(), $newEmail);
        $_SESSION['user'] = $user;
    }
}
