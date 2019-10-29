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

/**
 * Process any throw tags that this function comment has.
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
 * Process any throw tags that this function comment has.
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
    if ($database->getNumberTopic() <= 10) {
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
 * Process any throw tags that this function comment has.
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

