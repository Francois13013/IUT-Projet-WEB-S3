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

require_once 'Models/RequireAll.php';
$database = new Database(
    'mysql-francois.alwaysdata.net',
    'francois_oui',
    '0621013579',
    'francois_project'
);
$database->getAllTopic();

foreach ($_SESSION['topicArray'] as &$value) {
    echo '<div class = \'topicRow\'>' .
        $value->getNameTopics()
        . $value->getStatut()
        . '</div>';
};

