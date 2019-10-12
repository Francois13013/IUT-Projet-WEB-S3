<?php
require_once('classes/Route.php');
require_once('Controllers/Controller.php');

Router::add('/testa', function() {
    Controller::CreateView('index');
});

//$test = new Router();
//$test->add('/testa', function (){
//    require ('header.php');
//    include_once('footer.php');
//});
//$test->Launch();
?>