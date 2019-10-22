<?php
require_once('classes/Database.php');
//$topic = new Topic('123','test azd','1');
$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();
print_r($_SESSION['topicArray']);
?>
