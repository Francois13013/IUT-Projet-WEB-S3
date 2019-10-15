<form id="singupform" action="/Controllers/controllerRegister.php" method="post">
    <label id="labelPseudo" for="Surname">Pseudo</label>
    <input id="Surname" class="inputsingup" type="text" name="Pseudo">
    <label id="labelEmail" for="Email">Email</label>
    <input id="Email" class="inputsingup" type="text" name="Email">
    <label for="Password">Mot de passe</label>
    <input id="Password" class="inputsingup" type="password" name="Password">
    <label for="RepeterMDP">Repeter MDP</label>
    <input id="RepeterMDP" class="inputsingup" type="password" name="PasswordTwice">
    <input id="checkbox" class="inputsingup" type="checkbox" name="checkbox" value="close">
    <label href="/ConditionUtilisateur" for="checkbox">J'accepte vous les conditions d'utilisation</label>

    <input id="submitform" type="submit" value="submit">
</form>


<?php
if (isset($_SESSION['Probleme'])) {
    if (strpos($_SESSION['Probleme'], ',') > 1) {
        $bypass = array();
        $bypass = explode(',', $_SESSION['Probleme']);
        print_r($bypass);
//        $count = count($bypass);
    } else {
        $bypass = $_SESSION['Probleme'];
        print_r($bypass);
        $count = true;
    }
}
echo '<script type="text/javascript" src="../Public/js/RedBorder.js"></script>';

if($count == true){
    echo '<script type="text/javascript">' . 'ErrorCall(' . ' \'' . $bypass . '\' ' . ');' . '</script>';
} else {
    for ($i = 0; $i < (count($bypass)); $i++) {
        echo '<script type="text/javascript">' . 'ErrorCall(' . ' \'' . $bypass[$i] . '\' ' . ');' . '</script>';
    }
}
    unset($_SESSION['Probleme']);
?>


<!--    <form id="singupform" action="/Controllers/controllerRegister.php" method="post">-->
<!--        <a>FirstName</a>-->
<!--        <input class="inputsingup" type="text" name="FirstName">-->
<!--        <a>LastName</a>-->
<!--        <input class="inputsingup" type="text" name="LastName">-->
<!--        <a>Surname</a>-->
<!--        <input class="inputsingup" type="text" name="Surname">-->
<!--        <a>Email</a>-->
<!--        <input class="inputsingup" type="text" name="Email">-->
<!--        <a>Password</a>-->
<!--        <input class="inputsingup" type="password" name="Password">-->
<!--        <a>PasswordTwice</a>-->
<!--        <input class="inputsingup" type="password" name="PasswordTwice">-->
<!--        <input class="inputsingup" type="checkbox" name="checkbox" value="close">-->
<!--        <input id="submitform" type="submit" value="submit">-->
<!--    </form>-->