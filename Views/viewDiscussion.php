<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * PHP VERSION 7.2.22
 *
 * @category   JeSaisPas
 * @package    WordPress
 * @subpackage Mytheme
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

require_once 'Controllers/controllerDiscussion.php';
session_start();
?>

<div id="mainDiscussion">
    <?php
    checknumbermsg();
    if (array_key_exists('Close', $_POST)) {
        closeMessage();
    } else if (array_key_exists('CloseDiscussion', $_POST)) {
        closeTopic();
    } else if (array_key_exists('RenameTopic', $_POST)) {
    } else if (array_key_exists('DeleteTopic', $_POST)) {
        deleteTopic();
    }

    ?>
    <div id='ContentTopic'>
        <form method="post"  onsubmit="<?php addWords();?>">
            <label>Message</label>
            <input type='text' name="msg">
            <button action="submit">Envoyer</button>
        </form>
        <div id="allMessages">
            <?php requestMessage();?>
        </div>
    </div>
    <form id='MenuTopicIn' method="POST">
        <?php echoMenu() ?>
    </form>
</div>
