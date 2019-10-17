<?php
session_start();
class Router {
    public static $url = array();
    public static $function;
    public static $innerComparator;

    public static function forceHTTPS(){
        if( isset($_SERVER['HTTPS'] ) ) {
        } else {
            echo '<meta http-equiv="refresh" content="0;url='. "Https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'" />';
        }
    }

    public static function add($route, callable $innerText){
//        self::forceHTTPS();
        self::$url[$route] = $route; // dans array url[Url] = func
        if($_SERVER["REQUEST_URI"] == $route) {
            $innerText(); //lance la fonction de view
        }
    }

    public static function addTwoWay($route,$route2, callable $innerText){
            self::add($route,$innerText);
            self::add($route2,$innerText);
    }

    public static function checkErrorUrl(){
        if ((array_key_exists($_SERVER["REQUEST_URI"], self::$url)) == false ){
            Controller::CreateErrorView(    '404');
        }

    }
    public static function addLoggedWay($route, callable $innerText){
        if($_SESSION['login'] == 'ok') {
            self::add($route, $innerText);
        }
    }

    public static function addNoLoggedWay($route, callable $innerText){
        if($_SESSION['login'] != 'ok') {
            self::add($route, $innerText);
        }
    }







//
//            self::$url[$route] = $route; // dans array url[Url] = func
//        echo self::$url[$route] . '<br><hr>';
//        $path = $_SERVER["REQUEST_URI"]; // met dans path l'url courante
//        print_r($path);
//
////        if($path == self::$url[$route]) {
//        if(array_key_exists($path, self::$url) && ($path == self::$url)) {
////            print_r(self::$url[$path]);
////            self::$innerComparator = self::$innerComparator + 1;
////            echo  self::$innerComparator;
////            if(self::$innerComparator == 1) {
//            $innerText(); //lance la fonction de view
////                exit();
////        }
//        } else{
//            self::$url['']; //remet l'url a ''
////            self::$innerComparator = self::$innerComparator + 1;
////            if(self::$innerComparator != 1) {
//            Controller::CreateErrorView('404');
////            break;
//
////            }
////            echo "<br><hr>";
////            echo 'marche po';
////            echo "<br><hr>";
////            print_r(self::$url);
//        }
//    }
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