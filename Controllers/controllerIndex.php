<?php
require_once ('classes/Database.php');
require_once('classes/Router.php');
require_once('classes/Controller.php');

$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();


function Request() {
    foreach($_SESSION['topicArray'] as &$value) {
//        Router::add('/' . $value->getIdTopic(),function() {
//            Controller::CreateStandardView('viewForgetPassword');
//        });
        echo $value->getIdTopic();
        $url = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $value->getIdTopic();

//        onclick="fonction(this.href); return false;"

        $onclick = 'onClick=' . 'location.href="/' . $value->getIdTopic() . '";';


        echo '<div class = \'topicRow\' '. $onclick . '>' .
        '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
        '<p class=\'Statut\'>' .  $value->getStatut() . '</p>' .
        '</div>';
    }
};


    ?>