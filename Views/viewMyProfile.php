<?php

//    $User = $_SESSION['user'];
//    echo $User->getFirstName();


echo $_SESSION["IdUser"] . '<br><hr>';
echo $_SESSION["Surname"] . '<br><hr>';
echo $_SESSION["Email"] . '<br><hr>';
echo $_SESSION["Password"] . '<br><hr>';
echo $_SESSION["Status"] . '<br><hr>';

?>
<?php;
if ($_SESSION["Status"] == 1)
//        echo $_SESSION["Status"] . '<br><hr>';
    echo '<a class="aligntext">' . "admin" . '</a>';
elseif ($_SESSION["Status"] == 2)
    echo '<a class="aligntext">' . "utilisateur". '</a>';
?>


<?php
echo 'Change Surname' . '<br>';
?>
<input class="favorite styled" type="button" value="Change Surname">. <br>;

<?php
echo 'Change Email' . '<br>';
echo $_SESSION["Email"] . '<br><hr>';
echo 'Change Password' . '<br>';
echo $_SESSION["Password"] . '<br><hr>';


?>
<form method="post" action="../Controllers/controllerMyProfile.php">
    <label>zeub</label>
    <input class="favorite styled" type="text" name="hachek">;
    <input class="favorite styled" type="submit" value="action">;

</form>




