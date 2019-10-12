<?php
require_once('classes/Route.php');
$router = new Route();
$router->add_route('/azerty', function(){
    echo 'Hello World';
});
$router->execute();
?>