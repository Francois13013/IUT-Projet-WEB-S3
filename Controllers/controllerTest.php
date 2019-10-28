<?php
require_once ('Models/RequireAll.php');
$database = new Database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();

foreach($_SESSION['topicArray'] as &$value){
    echo '<div class = \'topicRow\'>' . $value->getNameTopics() . $value->getStatut() . '</div>';
};

