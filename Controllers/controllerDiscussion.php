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
    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
    $id = $currentTopic->getIdTopic();
    $messageToSend = $_POST['msg'];
    if($currentTopic->getStatut() != 0) {
        if (isset($messageToSend) && preg_match("/[A-Za-z0-9]+/", $messageToSend) && count(explode(' ', $messageToSend)) == 2) {
            if ($database->CheckIdUserOnMessage($id, $_SESSION["IdUser"]) == false) { //verif si l'user a ecrit ou pas
                if ($database->getLastMessageStatut($id) == 0) {
                    $database->newMessage($id, $_SESSION["IdUser"]);
                    $lastNewMessage = $database->getLastMessages($currentTopic->getIdTopic());
                    $database->addContentMsg($lastNewMessage, $_POST['msg'], $_SESSION["IdUser"]);
                } else {
                    if ($database->getLastMessages($id)) {
                        $database->addContentMsg($database->getLastMessages($currentTopic->getIdTopic()), ' ' . $_POST['msg'], $_SESSION["IdUser"]);
                    } else {
                        $database->newMessage($id, $_SESSION["IdUser"]);
                        $lastNewMessage = $database->getLastMessages($currentTopic->getIdTopic());
                        $database->addContentMsg($lastNewMessage, $_POST['msg'], $_SESSION["IdUser"]);
                    }
                    unset($_POST['msg']);
                }
            }
        }
    }
        return false;
}

function closeMessage(){
    $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
    $lastid = $database->getLastMessages($currentTopic->getIdTopic());
    $database->CloseMessage($lastid);
}

function closeTopic(){
    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
    $database->closeTopic($currentTopic->getIdTopic());
}

function deleteTopic(){
    $database = new database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/', $_SERVER['REQUEST_URI'])[1]);
    $database->deleteTopic($currentTopic->getIdTopic());
    echo "<script>window.location.href='/'</script>";
}

function echoMenu(){

    if($_SESSION['login'] == 'ok') {
        $html = '<input type="submit" name="Close" class="button" value="Fermer le message" />';
    }
    if($_SESSION["Status"] == 1){
        $html .= '<input type="submit" name="CloseDiscussion" class="button" value="Fermer la discussion" />';
        $html .= '<input type="text" name="RenameTopicText"/>';
        $html .= '<input type="submit" name="RenameTopic" class="button" value="Renomer le topic" />';
        $html .= '<input type="submit" name="DeleteTopic" class="button" value="Supprimer le topic" />';
    }
    echo $html;
}
?>