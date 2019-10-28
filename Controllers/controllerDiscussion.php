<?php
require_once ('Models/RequireAll.php');

session_start();

$database = new Database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
define('currentIdTopic',$currentTopic->getIdTopic());

function RequestMessages(){
    $database = new Database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $database->getAllMessages(currentIdTopic);
    $allMessageFromThisTopic = $_SESSION['messagesArray' . currentIdTopic];
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
    if($_SESSION['login'] == 'ok') {
        $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
        $currentTopic = $database->getTopic(currentIdTopic);
        $messageToSend = $_POST['msg'];
        if ($currentTopic->getStatut() != 0) {
            if (isset($messageToSend) && preg_match("/[A-Za-z0-9]+/", $messageToSend) && count(explode(' ', $messageToSend)) <= 2) {
//            $array = $database->requestIdUsersWritten($id);
//            $arraytwo = explode(',',$array);
                if ($database->getLastMessageStatut(currentIdTopic) == 0) {
                    $database->newMessage(currentIdTopic, $_SESSION["IdUser"]);
                    $lastNewMessage = $database->getLastMessages(currentIdTopic);
                    $database->addContentMsg($lastNewMessage, $_POST['msg'], $_SESSION["IdUser"]);
                } else {
                    $lastNewMessage = $database->getLastMessages(currentIdTopic);
                    if ($database->CheckIdUserOnMessage($lastNewMessage, $_SESSION["IdUser"]) == false) { //verif si l'user a ecrit ou pas
                        if ($database->getLastMessages(currentIdTopic)) {
                            $database->addContentMsg($database->getLastMessages(currentIdTopic), ' ' . $_POST['msg'], $_SESSION["IdUser"]);
                        } else {
                            $database->newMessage(currentIdTopic, $_SESSION["IdUser"]);
                            $lastNewMessage = $database->getLastMessages(currentIdTopic);
                            $database->addContentMsg($lastNewMessage, $_POST['msg'], $_SESSION["IdUser"]);
                        }
                    }
                }
            }
        }
        return false;
    }
    unset($_POST['msg']);
    return false;
}

function closeMessage(){
    $database = new Database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $lastid = $database->getLastMessages(currentIdTopic);
    if ($database->CheckIdUserOnMessage($lastid, $_SESSION["IdUser"]) == true) {
    $database->CloseMessage($lastid);
    }
}

function closeTopic(){
    $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $currentTopic = $database->getTopic(currentIdTopic);
    $database->closeTopic(currentIdTopic);
}

function deleteTopic(){
    $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $database->deleteTopic(currentIdTopic);
    echo "<script>window.location.href='/'</script>";
}

function echoMenu(){

    if($_SESSION['login'] == 'ok') {
        $html = '<div id="MenuUserDiscussion">';
        $html .= '<input type="submit" name="Close" class="button" value="Fermer le message" />';
        $html .= '</div>';
    }
    if($_SESSION["Status"] == 1){
        $html .= '<div id="MenuAdminDiscussion">';
        $html .= '<input type="submit" name="CloseDiscussion" class="button" value="Fermer la discussion" />';
        $html .= '<input type="text" name="RenameTopicText"/>';
        $html .= '<input type="submit" name="RenameTopic" class="button" value="Renomer le topic" />';
        $html .= '<input type="submit" name="DeleteTopic" class="button" value="Supprimer le topic" />';
        $html .= '</div>';
    }
    echo $html;
}

function checknumbermsg(){
    $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    if($database->getNumberMessage(currentIdTopic) >= 40){                                                                                  // Limite de 40 messages
        $database->closeTopic(currentIdTopic);
    }
}
