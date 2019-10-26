<?php
require_once ('classes/Database.php');
require_once('classes/Router.php');
require_once('classes/Controller.php');

$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();

//$_SESSION['noDouble'];

function controllerAddTopic(){
    if(isset($_POST['nameTopic']) && !empty($_POST['nameTopic']) && !empty($_POST['nameTopic'])){
        $tmp = $_POST['nameTopic'];
        $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
        $queryOne = 'Insert INTO Topics (NameTopic) VALUES ("' . $tmp . '")';
//        $database->Error($queryOne);
        mysqli_query($database->getDbLink(), $queryOne);
    }
//    if(!empty($_POST['nameTopic'] && !empty($_POST['nameTopic']))){
//        if(isset($_POST['nameTopic'])){
//            if($_SESSION['noDouble']==false) {
//                $_SESSION['noDouble'] = true;
//            }
//    unset($_POST['nameTopic']);
}

function Request()
{

    foreach ($_SESSION['topicArray'] as &$value) {
//        Router::add('/' . $value->getIdTopic(),function() {
//            Controller::CreateStandardView('viewForgetPassword');
//        });
        $url = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $value->getIdTopic();

//        onclick="fonction(this.href); return false;"

        $onclick = 'onClick=' . 'location.href="/Topic/' . $value->getIdTopic() . '";';
        if ($value->getStatut() == 1) {
            $txt = 'ouvert';
        } else {
            $txt = 'Fermée';
        }

        echo '<div class = \'topicRow\' ' . $onclick . '>' .
            '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
            '<p class=\'Statut\'>' . $txt . '</p>' .
            '</div>';
    }
}

    ?>