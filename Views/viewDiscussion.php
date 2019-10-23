<?php
require_once ('Controllers/controllerDiscussion.php');
?>

<div>
    <div id='ContentTopic'>
        <table>
            <?php RequestMessages();?>
        </table>
        <form>
            <label>Message</label>
            <input type='text'>
            <button>Envoyer</button>
        </form>
    </div>
    <div id='MenuTopicIn'>
        <button>Fermer cette discussion</button>
        <button>Clore message</button>
        <button>Rename Topic</button>
        <button>Supprimer Topic</button>
    </div>
</div>
