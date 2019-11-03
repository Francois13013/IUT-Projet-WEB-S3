<?php

/**
 * Vue MyProfile
 *
 * PHP VERSION 7.2.22
 *
 * @category   View
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

require_once 'Controllers/controllerMyProfile.php';


?>


<div id="mainInfo">
    <h1>Vos Infos</h1>
    <?php showInfo(); ?>
    <div>
        <form method="post" onsubmit='<?php changeEmail();?>'>
            <label>Changer mon adresse mail</label>
            <input name="ChangeEmail" type="text">
            <button type="submit" >Changer</button>
        </form>
        <form method="post" onsubmit='<?php changePassword();?>'>
            <label>Changer mon mot de passe</label>
            <input name="ChangePassword" type="text">
            <button type="submit" >Changer</button>
        </form>
    </div>
</div>