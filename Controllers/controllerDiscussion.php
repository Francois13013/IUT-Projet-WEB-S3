<?php
    require_once('classes/Database.php');
    require_once('classes/Message.php');
    require_once('Controllers/controllerDiscussion.php');

session_start();

function RequestMessages(){
    $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
//    echo $database->getLastMessages($currentTopic->getIdTopic());
    $database->getAllMessages($currentTopic->getIdTopic());
    $allMessageFromThisTopic = $_SESSION['messagesArray' . $currentTopic->getIdTopic()];
    foreach($allMessageFromThisTopic as &$thisMessage){
        $html = '<div>';
        $html .= '<p class="Message">';
        $html .= $thisMessage->getcontent();
        $html .= '</p>';
        $html .= '</div>';
        echo $html;
    }
}

function AddWords()
{
    $messageToSend = $_POST['msg'];
    if (isset($messageToSend) && preg_match("/[A-Za-z0-9]+/", $messageToSend) && count(explode(' ', $messageToSend)) == 2) {
        $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
        $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
        $id = $currentTopic->getIdTopic();
        if ($database->getLastMessages($id)) {
            $database->addContentMsg($database->getLastMessages($currentTopic->getIdTopic()), ' ' . $_POST['msg']);
        } else {
            $database->newMessage($id);
            $lastNewMessage = $database->getLastMessages($currentTopic->getIdTopic());
            $database->addContentMsg($lastNewMessage, $_POST['msg']);
        }
        unset($_POST['msg']);
    } else {
        return false;
    }
}

function closeMessage(){
    $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
    $lastid = $database->getLastMessages($currentTopic->getIdTopic());
    $database->CloseMessage($lastid);
}
?>