<?php
include_once ('Controllers/controllerDiscussion.php');
session_start();
//echo $_SESSION['test4'];
//unset($_SESSION['test4']);
?>

<div>
    <div id='ContentTopic'>
        <table>
            <?php RequestMessages();?>
        </table>
        <form method="post"  onsubmit="<?php AddWords()?>" >
            <label>Message</label>
            <input type='text' name="msg">
            <button action="submit">Envoyer</button>
        </form>
    </div>
    <div id='MenuTopicIn'>
        <button>Fermer cette discussion</button>
        <button>Clore message</button>
        <button>Rename Topic</button>
        <button>Supprimer Topic</button>
    </div>
</div>
