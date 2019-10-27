<?php
include_once ('Controllers/controllerDiscussion.php');
session_start();

//function addContentMsg($id,$newContent){
//    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
//    $queryOne = 'Select Content from Messages where IdMessage = ' . '\'' . $id . '\'';
//    $array = array(
//        1 => "Content",
//    );
//    $returnedArray = $database->CheckError($queryOne, $array);
//    print_r($returnedArray);
//    $contentToAdd = $returnedArray[0] . $newContent;
////        print_r($contentToAdd);
//    $queryTwo = 'Update Messages SET Content = ' . '\'' . $contentToAdd . '\'' . 'where IdMessage = ' . '\'' . $id . '\'';
//    $database->Error($queryTwo);
//}

?>

<div>
    <?php
//    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
//    $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
//    $id = $currentTopic->getIdTopic();
//    print_r($database->getLastMessages($id));

    if(array_key_exists('Close', $_POST)) {
        closeMessage();
    } else if(array_key_exists('CloseDiscussion', $_POST)) {
        closeTopic();
    }else if(array_key_exists('RenameTopic', $_POST)) {

    }
    else if(array_key_exists('DeleteTopic', $_POST)) {

    }


    ?>
    <div id='ContentTopic'>
        <form method="post"  onsubmit="<?php AddWords();?>">
            <label>Message</label>
            <input type='text' name="msg">
            <button action="submit">Envoyer</button>
        </form>
        <table>
            <?php RequestMessages();?>
        </table>
    </div>
    <form id='MenuTopicIn' method="POST">
        <input type="submit" name="Close" class="button" value="Fermer le message" />
        <input type="submit" name="CloseDiscussion" class="button" value="Fermer la discussion" />
        <input type="submit" name="RenameTopic" class="button" value="Renomer le topic" />
        <input type="submit" name="DeleteTopic" class="button" value="Supprimer le topic" />
        <!--        <button>Fermer cette discussion</button>-->
<!--<!--        <input type="submit" action="submit" onsubmit="-->--><?php ////closeMessage();?><!--<!--">Fermer cette discussion-->-->
<!--<!--        <button onsubmit="-->--><?php ////closeMessage();?><!--<!--">Clore message</button>-->-->
<!--        <button>Rename Topic</button>-->
<!--        <button>Supprimer Topic</button>-->
    </form>
</div>
