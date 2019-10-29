<?php
/**
 * Fichier qui permet de gerer les controllers du site.
 * Avec des fonctions des différents types de vues
 *
 * PHP VERSION 7.2.22
 *
 * @category   Models
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

/**
 * Class Controller
 *
 * @category MVC
 * @package  MVC
 * @author   François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
 */
class Controller
{

    /**
     * Fonction qui crée une vue sans autre ajout
     *
     * @param $nameView Nom de la vue de facto du fichier
     *
     * @return void;
     */
    public static function createView($nameView)
    {
        include_once "Views/$nameView.php";
    }


    /**
     * Fonction qui crée une vue dîtes standard avec Header et Footer
     *
     * @param $nameView Nom de la vue de facto du fichier
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
