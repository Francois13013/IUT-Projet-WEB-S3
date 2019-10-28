<?php
require_once ('Models/RequireAll.php');
//require_once('classes/Database.php');
//$topic = new Topic('123','test azd','1');
$database = new Database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();

foreach($_SESSION['topicArray'] as &$value){
    echo '<div class = \'topicRow\'>' . $value->getNameTopics() . $value->getStatut() . '</div>';
};
?>
