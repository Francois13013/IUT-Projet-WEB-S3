<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * PHP VERSION 7.1
 *
 * @category   JeSaisPas
 * @package    WordPress
 * @subpackage Mytheme
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

require_once 'RequireAll.php';

session_start();


/**
 *  Description de la classe.
 *
 * Class Router
 *
 * @category Test
 * @package  Test
 * @author   Test <test@test.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     Test
 */
class Router
{
    public static $url = array();
    public static $function;
    public static $innerComparator;

    /**
     * Description function
     *
     * @return void
     */
    public static function forceHTTPS()
    {
        if (isset($_SERVER['HTTPS'])) {
        } else {
            echo '<meta http-equiv="refresh" content="0;url='
                . "Https://"
                . $_SERVER['HTTP_HOST']
                . $_SERVER['REQUEST_URI']
                . '" />';
        }
    }

    /**
     * Description function
     *
     * @param $route     Description Param
     * @param $innerText Description Param
     *
     * @return void
     */
    public static function add($route, callable $innerText)
    {
        self::$url[$route] = $route; // dans array url[Url] = func
        if ($_SERVER["REQUEST_URI"] == $route) {
            $innerText(); //lance la fonction de view
        }
    }

    /**
     * Description function
     *
     * @param $route     Description Param
     * @param $route2    Description Param
     * @param $innerText Description Param
     *
     * @return void
     */
    public static function addTwoWay($route, $route2, callable $innerText)
    {
        self::add($route, $innerText);
        self::add($route2, $innerText);
    }

    /**
     * Description function
     *
     * @return void
     */
    public static function checkErrorUrl()
    {
        if ((array_key_exists($_SERVER["REQUEST_URI"], self::$url)) == false) {
            Controller::createErrorView('404');
        }

    }

    /**
     * Description function
     *
     * @param $route     Description Param
     * @param $innerText Description Param
     *
     * @return void
     */
    public static function addLoggedWay($route, callable $innerText)
    {
        if ($_SESSION['login'] == 'ok') {
            self::add($route, $innerText);
        }
    }

    /**
     * Description function
     *
     * @param $route     Description Param
     * @param $innerText Description Param
     *
     * @return void
     */
    public static function addNoLoggedWay($route, callable $innerText)
    {
        if ($_SESSION['login'] != 'ok') {
            self::add($route, $innerText);
        }
    }

    /**
     * Description function
     *
     * @return void
     */
    public static function getAllTopicsRoutes()
    {
        $database = new Database(
            'mysql-francois.alwaysdata.net',
            'francois_oui',
            '0621013579',
            'francois_project'
        );
        $database->getAllTopic();
        if (isset($_SESSION['topicArray'])) {
            foreach ($_SESSION['topicArray'] as &$value) {
                Router::add(
                    '/Topic/' . $value->getIdTopic(), function () {
                        Controller::createStandardView('viewDiscussion');
                    }
                );
            }
        }
    }
}
