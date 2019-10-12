<?php
require_once('classes/Router.php');
require_once('classes/Controller.php');

Router::add('/Index', function() {
//    echo "Index <br><hr> ";
    Controller::CreateStandardView('viewIndex');
});

Router::add('/ForgetPassword', function() {
//    echo "ForgetPassword <br><hr> ";

        Controller::CreateStandardView('viewForgetPassword');
});

Router::add('/MyProfile', function() {
    Controller::CreateStandardView('viewMyProfile');
});

//Router::add('', function() {
//    Controller::CreateView('viewError404');
//});

Router::checkErrorUrl();

//Router::add('FinalKey', function() {
//    Controller::CreateView('viewError404');
//});

//
//$test = new Router();
//$test->add('/testa', function (){
//    require ('header.php');
//    include_once('footer.php');
//});
//$test->Launch();
?>