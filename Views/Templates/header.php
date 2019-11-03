<!DOCTYPE html>
<html lang="fr">
<head>
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

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1000000" >
    <title>FreeNote</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
    <link rel="stylesheet" href="../../Public/css/errorPopupJs.css">
</head>
<body>
<header>
    <img alt="logo site" id='logoFreenote' src="../../Public/media/freenote.png" >
    <img alt="logo utilisateur" id="logoUser" src="../../Public/media/user.png" >
</header>

<form class="userMenu" method="post">
    <label for='usernameInput'>Nom d'utilisateur</label>
    <input name="username" id="usernameInput" class="login" type="text">
    <label for='passwordInput'>Mot de passe</label>
    <input name="password" id="passwordInput" class="login" type="password">
    <div id="divisionButton">
        <button formaction="/Controllers/controllerLogin.php"
                type="submit" name="submit" class="subButton">Connexion</button>
        <button formaction="/ForgetPassword"
                class="subButton">Mot de passe oublié</button>
    </div>
    <button formaction="/Register" id='signup'>Inscrivez-vous</button>
</form>
<div id='midpage'>
