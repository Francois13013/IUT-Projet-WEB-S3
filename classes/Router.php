<?php

class Router {
    public static $url = array();

    public static $innerComparator;

    public static function add($route, callable $innerText){
        self::$url[$route] = $innerText; // dans array url[Url] = func
        $path = $_SERVER["REQUEST_URI"]; // met dans path l'url courante
//        print_r($path);

//        if($path == self::$url[$route]) {
        if(array_key_exists($path, self::$url)) {
//            print_r(self::$url[$path]);
            self::$innerComparator = self::$innerComparator + 1;
//            echo  self::$innerComparator;
            if(self::$innerComparator == 1) {
                $innerText(); //lance la fonction de view
            }
        } else {
            self::$url['']; //remet l'url a ''
//            echo "<br><hr>";
//            echo 'marche po';
//            echo "<br><hr>";
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