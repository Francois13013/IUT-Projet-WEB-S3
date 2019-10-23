<?php
    require_once('classes/Database.php');
    require_once('classes/Message.php');
    require_once('Controllers/controllerDiscussion.php');

session_start();

function RequestMessages(){
    $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
//    $database->addContentMsg('2',' et salut j ajoute ca');
    echo $database->getLastMessages($currentTopic->getIdTopic());
//    print_r($_SESSION['lastMessageFromTopic' . $currentTopic->getIdTopic()]);
    $database->getAllMessages($currentTopic->getIdTopic());
    //    print_r( $_SESSION['messagesArray' . $currentTopic->getIdTopic()]);
    $allMessageFromThisTopic = $_SESSION['messagesArray' . $currentTopic->getIdTopic()];
    foreach($allMessageFromThisTopic as &$thisMessage){
        $html = '<div>';
        $html .= $thisMessage->getcontent();
        $html .= '<div>';
        echo $html;
    }
}

function AddWords(){
//    $_SESSION['test4'] = $_POST['msg'];
//    unset($_SESSION['test4']);
//    $_SESSION['test4'] = 'test1';
    $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
    $currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
    $database->addContentMsg($database->getLastMessages($currentTopic->getIdTopic()),$_POST['msg']);
//    header('Location : /Topic/12');
//    exit();
}

?>