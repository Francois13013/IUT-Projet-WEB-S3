<?php
require_once ('classes/Database.php');
$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();


function Request() {
    foreach($_SESSION['topicArray'] as &$value) {
        Router::add($value->getId());
        echo '<div class = \'topicRow\'>' .
        '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
        '<p class=\'Statut\'>' .  $value->getStatut() . '</p>' .
        '</div>';
    }
};


    ?>