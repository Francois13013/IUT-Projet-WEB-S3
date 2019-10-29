<?php
/**
 * Controller de la view Index
 * Recupère les Topics
 *
 * PHP VERSION 7.2.22
 *
 * @category   Controller
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
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

define('OPENTOPICLIMIT','10'); //Limite de topic ouvert en même temps
define('TOPICLIMIT','20'); //Limite globale du nombre de topic ouvert ou fermé

/**
 * Affiche les topics où il y a le plus de message
 *
 * @return void
 */
function requestTop()
{
    $html = '<h1>#1 bla bla bla bla</h1>';
    $html .= '<h1>#2 bla bla bla bla</h1>';
    $html .= '<h1>#3 bla bla bla bla</h1>';
    echo $html;
}

/**
 * Met en place un nombre max de topic
 * Et ajoute en un si la condition est respecté
 *
 * @return void
 */
function controllerAddTopic()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    if ($database->getNumberTopicOpen() <= OPENTOPICLIMIT
        && $database->getNumberTopic() <= TOPICLIMIT) {
        if (isset($_POST['nameTopic']) && !empty($_POST['nameTopic'])
            && !empty($_POST['nameTopic']) && $_POST
        ) {
            $database->newTopic($_POST['nameTopic']);
            unset($_POST['nameTopic']);
            header("Refresh:0");
            exit();
        }
    }
}

/**
 * Recupère les topics et les affiches
 *
 * @return void
 */
function request()
{

    foreach ($_SESSION['topicArray'] as &$value) {
        $onclk = 'onClick=' . 'location.href="/Topic/' . $value->getIdTopic() . '";';
        if ($value->getStatut() == 1) {
            $txt = 'ouvert';
        } else {
            $txt = 'Fermée';
        }

        echo '<div class = \'topicRow\' ' . $onclk . '>' .
            '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
            '<p class=\'Statut\'>' . $txt . '</p>' .
            '</div>';
    }
}

