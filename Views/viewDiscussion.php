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
        deleteTopic();
    }


    ?>
    <div id='ContentTopic'>
        <form method="post"  onsubmit="<?php AddWords();?>">
            <label>Message</label>
            <input type='text' name="msg">
            <button action="submit">Envoyer</button>
        </form>
        <table>
            <?php

//            $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
//            $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
//            $id = $currentTopic->getIdTopic();
//            $idm = $database->getLastMessages($currentTopic->getIdTopic());
//            $query = 'Select IdUsersCat from Messages WHERE IdMessage =' . '\'' . $idm . '\'';
//            $array = array(
//                 1 => "IdUsersCat",
//            );
//            print_r($database->CheckError($query, $array));
//            echo 'test';

//            $array = $database->requestIdUsersWritten($id);
//            $arraytwo = explode(',',$array);
//            print_r($array);

            RequestMessages();?>

        </table>
    </div>
    <form id='MenuTopicIn' method="POST">
        <?php echoMenu() ?>
    </form>
</div>
