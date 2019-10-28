<?php

require_once ('RequireAll.php');

session_start();



class Router
{
    public static $url = array();
    public static $function;
    public static $innerComparator;

    public static function forceHTTPS()
    {
        if (isset($_SERVER['HTTPS'])) {
        } else {
            echo '<meta http-equiv="refresh" content="0;url=' . "Https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" />';
        }
    }

    public static function add($route, callable $innerText)
    {
        self::$url[$route] = $route; // dans array url[Url] = func
        if ($_SERVER["REQUEST_URI"] == $route) {
            $innerText(); //lance la fonction de view
        }
    }

    public static function addTwoWay($route, $route2, callable $innerText)
    {
        self::add($route, $innerText);
        self::add($route2, $innerText);
    }

    public static function checkErrorUrl()
    {
        if ((array_key_exists($_SERVER["REQUEST_URI"], self::$url)) == false) {
            Controller::CreateErrorView('404');
        }

    }

    public static function addLoggedWay($route, callable $innerText)
    {
        if ($_SESSION['login'] == 'ok') {
            self::add($route, $innerText);
        }
    }

    public static function addNoLoggedWay($route, callable $innerText)
    {
        if ($_SESSION['login'] != 'ok') {
            self::add($route, $innerText);
        }
    }


    public static function getAllTopicsRoutes()
    {
        $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
        $database->getAllTopic();
        if (isset($_SESSION['topicArray'])) {
            foreach ($_SESSION['topicArray'] as &$value) {
                Router::add('/Topic/' . $value->getIdTopic(), function () {
                    Controller::CreateStandardView('viewDiscussion');
                });
            }
        }
    }
}
?>