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
 * Description function
 *
 * @param $className description param
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
    } else {
        return;
    }
}

spl_autoload_register("autoloadModel");
