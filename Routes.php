<?php
require_once('classes/Route.php');

Router::add('/testa', function() {
    require ('header.php');
    include_once('footer.php');
});

//$test = new Router();
//$test->add('/testa', function (){
//    require ('header.php');
//    include_once('footer.php');
//});
//$test->Launch();
?>