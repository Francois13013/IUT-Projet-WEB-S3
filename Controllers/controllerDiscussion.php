<?php
/**
 * Controller de la view Discussion
 * Elle met en relation les boutons de la view avec les fonctions de la classe
 * database pour traiter les informations
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

session_start();

$database = new Database(
    HOST,
    USER,
    PASSWORD,
    TABLENAME
);
$currentTopic = $database->getTopic(
    explode('/Topic/', $_SERVER['REQUEST_URI'])[1]
);
define('CURRENTIDTOPIC', $currentTopic->getIdTopic());

define('LIMITMSGPERTOPIC', '10'); //Limite de message par topic

/**
 * Récupère l'ensemble des messages de la base de donnée et les affiche
 *
 * @return void
 */
function requestMessage()
{
    $database = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    $database->getAllMessages(CURRENTIDTOPIC);
    $allMessageFromThisTopic = $_SESSION['messagesArray' . CURRENTIDTOPIC];
    foreach ($allMessageFromThisTopic as &$thisMessage) {
        $idCurrent = $thisMessage->getIdMessage();
        $html = '<div>';
        $html .= '<p class="Message">';
        $html .= $thisMessage->getcontent();
        $html .= '</p>';
        if (isset($_SESSION["IdUser"]) == true) {
            $html .= '<a>';
            $html .= 'Supprime ce message';
            $html .= '</a>';
        }
        $html .= '</div>';
        echo $html;
    }
}

/**
 * @param $email
 * @return bool
 */
function RmMessage($IdMessage){
    $db = new PDO(
        'mysql:host=mysql-francois.alwaysdata.net;dbname=francois_project',
        'francois_project',
        '0621013579');

    $sql =  'DELETE FROM Messages Where IdMessage = IdMessageBind';
    $dbp = $db->prepare($sql);
    $dbp->bindParam('IdMessageBind',$IdMessage);
    $dbp->execute();
}

/**
 * Verifie si les conditions de rajout de mot son valide
 * Puis concatene le texte mis en input dans la base de donnée
 * avec la partie de message déjà existant
 * Si c'est le premier message d'un topic en crée un
 *
 * @return void
 */
function addWords()
{
    if ($_SESSION['login'] == 'ok') {
        $db = new Database(
            HOST,
            USER,
            PASSWORD,
            TABLENAME
        );
        $currentTopic = $db->getTopic(CURRENTIDTOPIC);
        $messageToSend = $_POST['msg'];
        if ($currentTopic->getStatus() != 0) {
            if (isset($messageToSend) && preg_match("/[A-Za-z0-9]+/", $messageToSend)
                && count(explode(' ', $messageToSend)) <= 2
            ) {
                $idUser = $_SESSION["IdUser"];
                if ($db->getLastMessageStatut(CURRENTIDTOPIC) == 0) {
                    $db->newMessage(CURRENTIDTOPIC, $idUser);
                    $lastMessage = $db->getLastMessages(CURRENTIDTOPIC);
                    $db->addContentMsg(
                        $lastMessage, $_POST['msg'], $_SESSION["IdUser"]
                    );
                } else {
                    $lastMessage = $db->getLastMessages(CURRENTIDTOPIC);
                    if ($db->checkIdUserOnMessage($lastMessage, $idUser) == false) {
                        //verif si l'user a ecrit ou pas
                        if ($db->getLastMessages(CURRENTIDTOPIC)) {
                            $db->addContentMsg(
                                $db->getLastMessages(CURRENTIDTOPIC),
                                ' ' . $_POST['msg'], $idUser
                            );
                        } else {
                            $db->newMessage(CURRENTIDTOPIC, $idUser);
                            $lastMessage = $db->getLastMessages(CURRENTIDTOPIC);
                            $db->addContentMsg($lastMessage, $_POST['msg'], $idUser);
                        }
                    }
                }
            }
        }
    }
    unset($_POST['msg']);
}

/**
 * Recupere l'id du dernier message
 * et marque le status du dernier message sur "Fermé" de la discussion
 *
 * @return void
 */
function closeMessage()
{
    $database = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    $lastid = $database->getLastMessages(CURRENTIDTOPIC);
    if ($database->checkIdUserOnMessage($lastid, $_SESSION["IdUser"]) == true) {
        $database->closeMessage($lastid);
    }
}

/**
 * Selectionne la base de donnée
 * et marque le status du topic courant sur "Fermé"
 *
 * @return void
 */
function closeTopic()
{
    if ($_SESSION['login'] == 'ok' && $_SESSION["Status"] == 1) {
        $database = new Database(
            HOST,
            USER,
            PASSWORD,
            TABLENAME
        );
        $database->closeTopic(CURRENTIDTOPIC);
    }
}

/**
 * Selectionne la base de donnée
 * et supprime le topic courant
 * ainsi que les messages du topic
 * Renvoie sur l'accueil
 *
 * @return void
 */
function deleteTopic()
{
    if ($_SESSION['login'] == 'ok' && $_SESSION["Status"] == 1) {

        $database = new Database(
            HOST,
            USER,
            PASSWORD,
            TABLENAME
        );
        $database->insteadOfTrigger(CURRENTIDTOPIC);
        $database->deleteTopic(CURRENTIDTOPIC);
        echo "<script>window.location.href='/'</script>";
    }
}

/**
 * Affiche le menu correspondant au status de l'utilisateur
 *
 * @return void
 */
function echoMenu()
{

    if ($_SESSION['login'] == 'ok') {
        $html = '<div id="MenuUserDiscussion">';
        $html .= '<input type="submit" name="Close" class="button" 
        value="Fermer le message" />';
        $html .= '</div>';
    }
    if ($_SESSION["Status"] == 1) {
        $html .= '<div id="MenuAdminDiscussion">';
        $html .= '<input type="submit" name="CloseDiscussion" 
        class="button" value="Fermer la discussion" />';
        $html .= '<input type="text" name="RenameTopicText"/>';
        $html .= '<input type="submit" name="RenameTopic" class="button" 
        value="Renomer le topic" />';
        $html .= '<input type="submit" name="DeleteTopic" class="button" 
        value="Supprimer le topic" />';
        $html .= '</div>';
    }
    echo $html;
}

/**
 * Verifie le nombre de message dans un topic et fixe une limite
 * en cas de limite atteinte cela ferme le topic.
 *
 * @return void
 */
function checknumbermsg()
{
    $database = new Database(
        HOST,
        USER,
        PASSWORD,
        TABLENAME
    );
    if ($database->getNumberMessage(CURRENTIDTOPIC) >= LIMITMSGPERTOPIC) {
        // Limite de 40 messages
        $database->closeTopic(CURRENTIDTOPIC);
    }
}
