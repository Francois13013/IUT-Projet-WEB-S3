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

require_once 'Controllers/controllerIndex.php'
?>

<div id="mainIndex">
    <div id='containerInfoTop'>
         <div class="container" id="containerInfo">
           <p>Bienvenue sur FreeNote un site d'un nouveau genre développé par un groupe d'étudiants qui permet d'échanger à travers de courts messages de 1 ou 2 mots par utilisateur et que chaque utilisateur peut continuer jusqu'a ce que le message soit fermée.
               Les topics étant ouverts par les utilisateurs chacun peuvent trouver un sujet qui l'intéresse ou créer directement le sujet sur lequel il aimerait discuter.Qu'il soit utilisateur ou visiteur chacun peut consulter les différents
               sujets mais seuls les utilisateurs peuvent discuter à travers la plateforme.Avec Freenote partager de facon dynamique sur des sujets quelconques devient une addiction !
           </p>
         </div>
         <div class="container" id="containerTop">
                <?php requestTop();?>
         </div>
    </div>
    <div class="container" id="containerTopic">
            <form id="createTopic" method="post"
                  onsubmit="<?php controllerAddTopic();?>" >
                <label></label>
                <input type="text" name="nameTopic">
                <button action="submit"> Créer nouveau topic </button>
            </form>
            <?php request();?>
    </div>
</div>
