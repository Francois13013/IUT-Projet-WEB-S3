<?php
//require_once ('Models/RequireAll.php');
require_once 'Controllers/controllerDiscussion.php';
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

<div id="mainDiscussion">
    <?php
    //    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    //    $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
    //    $id = $currentTopic->getIdTopic();
    //    print_r($database->getLastMessages($id));


    checknumbermsg();
    if(array_key_exists('Close', $_POST)) {
        closeMessage();
    } else if(array_key_exists('CloseDiscussion', $_POST)) {
        closeTopic();
    }else if(array_key_exists('RenameTopic', $_POST)) {
    }
    else if(array_key_exists('DeleteTopic', $_POST)) {
        deleteTopic();
    }


    ?>
    <div id='ContentTopic'>
        <form method="post"  onsubmit="<?php AddWords();?>">
            <label>Message</label>
            <input type='text' name="msg">
            <button action="submit">Envoyer</button>
        </form>
        <div id="allMessages">
            <?php RequestMessages();?>
        </div>
    </div>
    <form id='MenuTopicIn' method="POST">
        <?php echoMenu() ?>
    </form>
</div>
