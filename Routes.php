<?php
require_once('classes/Router.php');
require_once('classes/Controller.php');

Router::add('/Index', function() {
    Controller::CreateStandardView('viewIndex');
});

Router::add('/ForgetPassword', function() {
    Controller::CreateStandardView('viewForgetPassword');
});

Router::add('/MyProfile', function() {
    Controller::CreateStandardView('viewMyProfile');
});

Router::add('/Error404', function() {
    Controller::CreateView('viewError404');
});

//$test = new Router();
//$test->add('/testa', function (){
//    require ('header.php');
//    include_once('footer.php');
//});
//$test->Launch();
?>