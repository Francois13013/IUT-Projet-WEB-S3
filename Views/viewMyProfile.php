<?php

//    $User = $_SESSION['user'];
//    echo $User->getFirstName();


echo $_SESSION["IdUser"] . '<br><hr>';
echo $_SESSION["Surname"] . '<br><hr>';
echo $_SESSION["Email"] . '<br><hr>';
echo $_SESSION["Password"] . '<br><hr>';
echo $_SESSION["Status"] . '<br><hr>';

?>
<?php
echo 'Change Surname' . '<br>';
echo $_SESSION["Surname"] . '<br><hr>';
echo 'Change Email' . '<br>';
echo $_SESSION["Email"] . '<br><hr>';
echo 'Change Password' . '<br>';
echo $_SESSION["Password"] . '<br><hr>';
echo $_SESSION["Status"] . '<br><hr>';

?>



