<?php

class Router {
    private $url = array();
    function add($route, callable $innerText){
        $this->url[$route] = $innerText;
    }
    function Launch() {
        $path = $_SERVER["REQUEST_URI"];
        print_r($path);
        echo '<br><hr>';
        if(array_key_exists($path, $this->url)) {
            $this->url[$path]();
        } else {
            $this->url['zdazdzaazdzaaz'];
        }
}
}


//class Route {
//    private $routes;
//    function add_route($route, callable $closure) {
//        $this->routes[$route] = $closure;
//    }
//    function execute() {
//        $path = $_SERVER['PATH_INFO'];
//        print_r($path);
//        if(array_key_exists($path, $this->routes)) {
//            $this->routes[$path]();
//        } else {
//            $this->routes[''];
//        }
//    }
//}
//$router = new Route();
//$router->add_route('azerty', function(){
//    echo 'Hello World';
//});
//$router->execute();



?>