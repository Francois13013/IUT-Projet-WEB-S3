<?php
require_once ('classes/Database.php');
require_once('classes/Router.php');
require_once('classes/Controller.php');

$database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
$database->getAllTopic();

//$_SESSION['noDouble'];

function controllerAddTopic(){
    if(isset($_POST['nameTopic']) && !empty($_POST['nameTopic']) && !empty($_POST['nameTopic']) && $_POST){
        $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
        $database->newTopic($_POST['nameTopic']);
        unset($_POST['nameTopic']);
        header("Refresh:0");
        exit();
    }
    return false;
}

function Request()
{

    foreach ($_SESSION['topicArray'] as &$value) {
//        Router::add('/' . $value->getIdTopic(),function() {
//            Controller::CreateStandardView('viewForgetPassword');
//        });
        $url = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $value->getIdTopic();

//        onclick="fonction(this.href); return false;"

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

    ?>