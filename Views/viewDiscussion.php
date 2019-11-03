<?php
/**
 * Lance les bonnes instructions lors de l'appuie sur des boutons
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require __DIR__ . "/../Controllers/controllerDiscussion.php";
//require_once '../Controllers/controllerDiscussion.php';
session_start();

?>

<div id="mainDiscussion">
    <?php
    checknumbermsg();
    if (array_key_exists('Close', $_POST)) {
        closeMessage();
    } else if (array_key_exists('CloseDiscussion', $_POST)) {
        closeTopic();
    } else if (array_key_exists('rmMessage', $_POST)) {
        rmmsg($_POST['rmMessageInput']);
    } else if (array_key_exists('DeleteTopic', $_POST)) {
        deleteTopic();
    }

    ?>
    <div id='ContentTopic'>
        <form method="post"  onsubmit="<?php addWords();?> ">
            <?php if (isset($_SESSION['login'])) {
                $html = '<label > Message</label >';
                $html .= '<input type = "text" name = "msg" >';
                $html .= '<button action = "submit" > Envoyer</button >';
            } else {
                $html = '<a>';
                $html .= 'Connectez-vous ou inscrivez-vous pour envoyer un message';
                $html .= '</a>';
            }
            echo $html;
            ?>
        </form>
        <div id="allMessages">
            <?php requestMessage();?>
        </div>
    </div>
    <form id='MenuTopicIn' method="POST">
        <?php echoMenu() ?>
    </form>
</div>
