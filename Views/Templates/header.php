<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    session_start();

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1000000" >
    <title>FreeNote</title>
    <link rel="stylesheet" href="../../Public/css/style.css">
</head>
<body>
<header>
<!--    <img alt="menu icon" class='corner' id="hamburger" src="../../Public/media/ham.png" >-->
    <img alt="logo site" id='logoFreenote' src="../../Public/media/freenote.png" >
    <img alt="logo utilisateur" id="logoUser" src="../../Public/media/user.png" >
</header>

<!--<header class="menuphonehamburger">-->
<!--    <img alt="logo site" id='mainimg2' src="../../Public/media/freenote.png" >-->
<!--    <a class="menulink" href="">Lien 1</a>-->
<!--    <a class="menulink" href="">Lien 2</a>-->
<!--    <a class="menulink" href="">Lien 3</a>-->
<!--    <a class="menulink" href="">Lien 4</a>-->
<!--    <img alt="logo utilisateur" class='submenupc' id="userpc" src="../../Public/media/user.png" >-->
<!--</header>-->

<form class="userMenu" method="post">
    <label for='usernameInput'>Nom d'utilisateur</label>
    <input name="username" id="usernameInput" class="login" type="text" value="username">
    <label for='passwordInput'>Mot de passe</label>
    <input name="password" id="passwordInput" class="login" type="password" value="password">
    <div id="divisionButton">
        <button formaction="Controllers/controllerLogin.php" type="submit" name="submit" class="subButton">Connexion</button>
        <button formaction="ForgetPassword" class="subButton">Mot de passe oublié</button>
    </div>
    <button formaction="Register" id='signup'>Inscrivez-vous</button>
</form>
<div id='midpage'>
