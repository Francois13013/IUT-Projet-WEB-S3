<?php
    session_start();
if(isset($_SESSION['MailSend']) && $_SESSION['MailSend'] == 'whynot') { echo 'Mail envoyé si ' . " l'adresse" . ' email existe.';
}
?>
<form action="../Controllers/controllerForgetPassword.php" method="POST">
    <input name='email' type='text'>
    <button>Envoyer</button>
</form>
