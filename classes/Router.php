<?php

class Router {
    public static $url = array();
    public static function add($route, callable $innerText){
        self::$url[$route] = $innerText;
        $path = $_SERVER["REQUEST_URI"];
        print_r($path);
        print_r(self::$url);
        if(array_key_exists($path, self::$url)) {
            $innerText();
            self::$url[$path];
        } else {
            self::$url['Error'];
//            print_r(self::$url);
        }
    }
//    public static function set($route, callable $innerPage){
//        $tmp = new Router();
//        $tmp->add($route, $innerPage);
//        $tmp->Launch();
//        $path = $_SERVER["REQUEST_URI"];
//        print_r($path);
//        echo '<br><hr>';
//        if(array_key_exists($path, self::$url)) {
//            self::$url[$path];
//        } else {
//            self::$url['zdazdzaazdzaaz'];
//        }
//    }
//    function Launch() {
//        $path = $_SERVER["REQUEST_URI"];
//        print_r($path);
//        echo '<br><hr>';
//        if(array_key_exists($path, self::$url)) {
//            self::$url[$path];
//        } else {
//            self::$url['zdazdzaazdzaaz'];
//        }
//}
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