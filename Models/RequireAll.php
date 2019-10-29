<?php
/**
 * Class d'auto chargement des classes
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
 * Fonction qui require la classe en parametre
 *
 * @param $className Nom de la classe à charger
 *
 * @return void
 */
function autoloadModel($className)
{
    if (isset($className)) {
        $filename = 'Models/' . $className . '.php';
        $filename2 = __DIR__ . '/' . $className . '.php';
        if (is_readable($filename)) {
            include_once $filename;
        } else if (is_readable($filename2)) {
            include_once $filename2;
        }
    }
}

spl_autoload_register("autoloadModel");
