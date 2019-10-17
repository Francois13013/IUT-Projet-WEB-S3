<?php
require_once('../classes/Database.php');
session_start();

$email = $_POST['email'];
$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362', 'baptistesevilla_projetweb');

?>