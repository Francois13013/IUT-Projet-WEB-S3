<?php
/**
 * Controller de la view Index
 * Récupère les Topics et les gère.
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
    HOST,
    USER,
    PASSWORD,
    TABLENAME
);
$database->getAllTopic();

define('OPENTOPICLIMIT', '10'); //Limite de topic ouvert en même temps
define('TOPICLIMIT', '20'); //Limite globale du nombre de topic ouvert ou fermé

/**
 * Affiche les topics où il y a le plus de messages
 *
 * @return void
 */
function requestTop()
{
    $database = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    $arrayTop = $database->getTopTopic();
    $topic1 = $database->getTopic($arrayTop[0]);
    $topic2 = $database->getTopic($arrayTop[1]);
    $topic3 = $database->getTopic($arrayTop[2]);
    $html = '<h2 class="TopTopic" id="Titre">' . 'Voici les topics les plus actifs';
    $html .= '</h2>';
    $html .= '<h3 class="TopTopic" onclick="location.href=\'/Topic/';
    $html .= $topic1->getIdTopic() . '\'" >#1 ' . $topic1->getNameTopic() .'</h3>';
    $html .= '<h3 class="TopTopic" onclick="location.href=\'/Topic/';
    $html .= $topic2->getIdTopic() . '\'" >#2 ' . $topic2->getNameTopic() .'</h3>';
    $html .= '<h3 class="TopTopic" onclick="location.href=\'/Topic/';
    $html .= $topic3->getIdTopic() . '\'" >#3 ' . $topic3->getNameTopic() .'</h3>';
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
    if (isset($_POST['nameTopic']) && !empty($_POST['nameTopic'])) {
        if ($_SESSION['login'] == 'ok') {
            if (isset($_POST['nameTopic']) && strlen($_POST['nameTopic']) > 2) {
                if (!preg_match(
                    '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',
                    $_POST['nameTopic']
                )
                ) {
                    $database = new Database(
                        HOST,
                        USER,
                        PASSWORD,
                        TABLENAME
                    );
                    if ($database->getNumberTopicOpen() < OPENTOPICLIMIT) {
                        if ($database->getNumberTopic() < TOPICLIMIT) {
                            $database->newTopic($_POST['nameTopic']);
                            unset($_POST['nameTopic']);
                            header("Refresh:0");
                            exit();
                        } else {
                            $_SESSION['inputError'] = 'Le maximum de topic';
                            $_SESSION['inputError'] .= ' est atteint';
                        }
                    } else {
                        $_SESSION['inputError'] = 'Le maximum de topic ouvert';
                        $_SESSION['inputError'] .= ' est atteint';
                    }
                } else {
                    $_SESSION['inputError'] = 'Le nom du topic ne doit pas avoir';
                    $_SESSION['inputError'] .= ' de caractères spéciaux.';
                }
            } else {
                $_SESSION['inputError'] = 'Le nom du topic doit être supérieur à';
                $_SESSION['inputError'] .= ' 2 caractères.';
            }
        } else {
            $_SESSION['inputError'] = 'Connectez-vous ou ';
            $_SESSION['inputError'] .= 'inscrivez-vous pour créer un topic.';
        }
    }
}

/**
 * Récupère les topics et les affiches
 *
 * @return void
 */
function request()
{
    foreach ($_SESSION['topicArray'] as &$value) {
        $onclk = 'onClick=' . 'location.href="/Topic/' . $value->getIdTopic() . '";';
        if ($value->getStatus() == 1) {
            $txt = 'Ouvert';
        } else {
            $txt = 'Fermé';
        }

        echo '<div class = \'topicRow\' ' . $onclk . '>' .
            '<p class=\'NameTopic\'>' . $value->getNameTopic() . '</p>' .
            '<p class=\'Statut\'>' . $txt . '</p>' .
            '</div>';
    }
}
