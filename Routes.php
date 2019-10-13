<?php
require_once('classes/Router.php');
require_once('classes/Controller.php');

Router::addTwoWay('/','/Index', function() {
    Controller::CreateStandardView('viewIndex');
});

Router::add('/ForgetPassword', function() {
        Controller::CreateStandardView('viewForgetPassword');
});

Router::addLoggedWay('/MyProfile', function() {
    Controller::CreateStandardView('viewMyProfile');
});

Router::add('/Register', function() {
    Controller::CreateStandardView('viewRegister');
});

Router::add('/Thanks', function() {
    Controller::CreateStandardView('viewThanks');
});

Router::checkErrorUrl();

//
//$test = new Router();
//$test->add('/testa', function (){
//    require ('header.php');
//    include_once('footer.php');
//});
//$test->Launch();
?>