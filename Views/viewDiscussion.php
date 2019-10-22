<?php
require_once ('classes/Database.php');
require_once ('Controllers/controllerDiscussion.php');

session_start();
echo 'vous etes sur la discussion ' . explode('/Topic/',$_SERVER['REQUEST_URI'])[1];
$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
echo '<br>';
$currentTopic = $database->getTopic(explode('/Topic/',$_SERVER['REQUEST_URI'])[1]);
print_r($currentTopic);
echo '<br>';
echo "voici son blaze " . $currentTopic->getNameTopics();
?>