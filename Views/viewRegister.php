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
?>


<form id="" action="/Controllers/controllerRegister.php" method="post">
    <label id="pseudoLabel" for="pseudoInput">Pseudo</label>
    <input id="pseudoInput" class="pseudo" type="text" name="Pseudo">
    <label id="emailLabel" for="emailInput">Email</label>
    <input id="emailInput" class="email" type="text" name="Email">
    <label for="passwordInput">Mot de passe</label>
    <input id="passwordInput" class="password" type="password" name="Password">
    <label for="twicePasswordInput">Repeter Mot de passe</label>
    <input id="twicePasswordInput"
           class="twicePassword" type="password" name="PasswordTwice">
    <input id="checkbox" class="" type="checkbox" name="checkbox" value="close">
    <label for="checkbox">J'accepte les conditions d'utilisation</label>

    <input id="submitform" type="submit" value="submit">
</form>


<?php
$bypass = array();
if (isset($_SESSION['Probleme'])) {
    if (strpos($_SESSION['Probleme'], ',') > 1) {
        $bypass = explode(',', $_SESSION['Probleme']);
    } else {
        $bypass = array($_SESSION['Probleme']);
        $count = true;
    }
}
echo '<script type="text/javascript" src="../Public/js/RedBorder.js"></script>';

if ($count == true) {
    echo '<script type="text/javascript">'
        . 'ErrorCall(' . ' \'' . $bypass . '\' ' . ');'
        . '</script>';
} else {
    for ($i = 0; $i < count($bypass); $i++) {
        echo '<script type="text/javascript">'
            . 'ErrorCall(' . ' \'' . $bypass[$i] . '\' ' . ');'
            . '</script>';
    }
}
    unset($_SESSION['Probleme']);
?>
