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

session_start();

$database = new Database(
    'mysql-francois.alwaysdata.net',
    'francois_oui',
    '0621013579',
    'francois_project'
);
$currentTopic = $database->getTopic(
    explode('/Topic/', $_SERVER['REQUEST_URI'])[1]
);
define('CURRENTIDTOPIC', $currentTopic->getIdTopic());

/**
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function requestMessage()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    $database->getAllMessages(CURRENTIDTOPIC);
    $allMessageFromThisTopic = $_SESSION['messagesArray' . CURRENTIDTOPIC];
    foreach ($allMessageFromThisTopic as &$thisMessage) {
        $html = '<div>';
        $html .= '<p class="Message">';
        $html .= $thisMessage->getcontent();
        $html .= '</p>';
        $html .= '</div>';
        echo $html;
    }
}

/**
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function addWords()
{
    if ($_SESSION['login'] == 'ok') {
        $db = new Database(
            'mysql-francois.alwaysdata.net',
            'francois_oui',
            '0621013579',
            'francois_project'
        );
        $currentTopic = $db->getTopic(CURRENTIDTOPIC);
        $messageToSend = $_POST['msg'];
        if ($currentTopic->getStatut() != 0) {
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
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function closeMessage()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    $lastid = $database->getLastMessages(CURRENTIDTOPIC);
    if ($database->checkIdUserOnMessage($lastid, $_SESSION["IdUser"]) == true) {
        $database->closeMessage($lastid);
    }
}

/**
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function closeTopic()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    $currentTopic = $database->getTopic(CURRENTIDTOPIC);
    $database->closeTopic(CURRENTIDTOPIC);
}

/**
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function deleteTopic()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    $database->deleteTopic(CURRENTIDTOPIC);
    echo "<script>window.location.href='/'</script>";
}

/**
 * Process any throw tags that this function comment has.
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
 * Process any throw tags that this function comment has.
 *
 * @return void
 */
function checknumbermsg()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    if ($database->getNumberMessage(CURRENTIDTOPIC) >= 40) {
        // Limite de 40 messages
        $database->closeTopic(CURRENTIDTOPIC);
    }
}
