<?php
/**
 * En cours
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


$database = new Database(
        HOST,
    USER,
    PASSWORD,
    TABLENAME
);
$topic = $database->getTopTopic();
print_r($topic);

?>
<h1>Vous avez cette Erreur</h1>
