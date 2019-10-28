<form id="" action="/Controllers/controllerRegister.php" method="post">
    <label id="pseudoLabel" for="pseudo">Pseudo</label>
    <input id="pseudoInput" class="pseudo" type="text" name="Pseudo">
    <label id="emailLabel" for="email">Email</label>
    <input id="emailInput" class="email" type="text" name="Email">
    <label for="passwordLabel">Mot de passe</label>
    <input id="passwordInput" class="password" type="password" name="Password">
    <label for="repeatPassword">Repeter Mot de passe</label>
    <input id="twicePasswordInput" class="twicePassword" type="password" name="PasswordTwice">
    <input id="" class="" type="checkbox" name="checkbox" value="close">
    <label href="/ConditionUtilisateur" for="checkbox">J'accepte ²les conditions d'utilisation</label>

    <input id="submitform" type="submit" value="submit">
</form>


<?php
if (isset($_SESSION['Probleme'])) {
    if (strpos($_SESSION['Probleme'], ',') > 1) {
        $bypass = array();
        $bypass = explode(',', $_SESSION['Probleme']);
        print_r($bypass);
    } else {
        $bypass = array($_SESSION['Probleme']);
        print_r($bypass);
        $count = true;
    }
}
echo '<script type="text/javascript" src="../Public/js/RedBorder.js"></script>';

if($count == true){
    echo '<script type="text/javascript">' . 'ErrorCall(' . ' \'' . $bypass . '\' ' . ');' . '</script>';
} else {
    for ($i = 0; $i < count($bypass); $i++) {
        echo '<script type="text/javascript">' . 'ErrorCall(' . ' \'' . $bypass[$i] . '\' ' . ');' . '</script>';
    }
}
    unset($_SESSION['Probleme']);
?>