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

/**
 *  Description de la classe.
 *
 * Class Controller
 *
 * @category Test
 * @package  Test
 * @author   Test <test@test.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     Test
 */
class Controller
{

    /**
     * Bla bla fonction.
     *
     * @param $nameView Voici une descripption du param
     *
     * @return void;
     */
    public static function createView($nameView)
    {
        include_once "Views/$nameView.php";
    }


    /**
     * Bla bla fonction.
     *
     * @param $nameView Voici une descripption du param
     *
     * @return void;
     */
    public static function createStandardView($nameView)
    {
        include_once 'Views/Templates/header.php';
        self::createView($nameView);
        include_once 'Views/Templates/footer.php';
    }


    /**
     * Bla bla fonction.
     *
     * @param $errorNumber Voici une descripption du param
     *
     * @return void;
     */
    public static function createErrorView($errorNumber)
    {
        self::createView('viewError');
        echo '<h1>' . $errorNumber . '</h1>';
    }
};
