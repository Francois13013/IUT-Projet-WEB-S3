<?php

class Route {
    private $routes;
    function add_route($route, callable $closure) {
        $this->routes[$route] = $closure;
    }
    function execute() {
        $path = $_SERVER['PATH_INFO'];

        if(array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            $this->routes['/']();
        }
    }
}

?>