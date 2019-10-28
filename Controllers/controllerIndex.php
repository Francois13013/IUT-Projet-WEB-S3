<?php
require_once 'Models/RequireAll.php';

$database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
$database->getAllTopic();

function RequestTop()
{
    $html = '<h1>#1 bla bla bla bla</h1>';
    $html .= '<h1>#2 bla bla bla bla</h1>';
    $html .= '<h1>#3 bla bla bla bla</h1>';
    echo $html;
}

function controllerAddTopic()
{
    $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    if ($database->GetNumberTopic() <= 10) {
        if (isset($_POST['nameTopic']) && !empty($_POST['nameTopic']) && !empty($_POST['nameTopic']) && $_POST) {
            $database->newTopic($_POST['nameTopic']);
            unset($_POST['nameTopic']);
            header("Refresh:0");
            exit();
        }
        return false;
    } else {
        return false;
    }
}
function Request()
{

    foreach ($_SESSION['topicArray'] as &$value) {
        $onclick = 'onClick=' . 'location.href="/Topic/' . $value->getIdTopic() . '";';
        if ($value->getStatut() == 1) {
            $txt = 'ouvert';
        } else {
            $txt = 'Fermée';
        }

        echo '<div class = \'topicRow\' ' . $onclick . '>' .
            '<p class=\'NameTopic\'>' . $value->getNameTopics() . '</p>' .
            '<p class=\'Statut\'>' . $txt . '</p>' .
            '</div>';
    }
}

