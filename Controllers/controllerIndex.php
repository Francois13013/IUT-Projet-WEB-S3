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
        echo '<div class = \'topicRow\'>' .
        '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
        '<p class=\'Statut\'>' .  $value->getStatut() . '</p>' .
        '</div>';
    }
};


    ?>