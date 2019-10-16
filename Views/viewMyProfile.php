<?php

//    $User = $_SESSION['user'];
//    echo $User->getFirstName();


echo $_SESSION["IdUser"] . '<br><hr>';
echo $_SESSION["Surname"] . '<br><hr>';
echo $_SESSION["Email"] . '<br><hr>';
echo $_SESSION["Password"] . '<br><hr>';
echo $_SESSION["Status"] . '<br><hr>';

?>

<button></button>

<?php
echo 'Change Surname' . '<br>';
?>
<input class="favorite styled"
       type="button"
       value="Change Surname">.<br>;

<?php
echo 'Change Email' . '<br>';
echo $_SESSION["Email"] . '<br><hr>';
echo 'Change Password' . '<br>';
echo $_SESSION["Password"] . '<br><hr>';

?>



