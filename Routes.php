<?php
require_once('classes/Route.php');
$test = new Router();
$test->add('/testa', function (){
    require ('header.php');
});
$test->Launch();
?>