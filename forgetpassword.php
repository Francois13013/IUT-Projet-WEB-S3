<?php include_once 'header.php'?>
<?php
require_once ('php/database.php');
session_start();

$email = $_POST['email'];
$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
if($databaseBaptiste->CheckEmail($email) == 1){
    mail($email,'Changement de mot de passe','Voici votre nouveau mdp '. sha1(rand(1000000,100000000)));
    echo "email trouvé";
} else if (isset($email)){
    header('Location: /index.php');
    exit();
}
?>
<form action="forgetpassword.php" method="POST">
    <input name='email' type='text'>
    <button>Envoyer</button>
</form>
<?php include_once 'footer.php'?>


