

</div>
<link rel="stylesheet" href="../../Public/css/stylefooter.css">
    <footer id="footer">
        <a class="bottom" href="#" onClick="MyWindow=window.open(
            '/Index','Accueil','width=600,height=300'
            ); return false;">Accords de confidentialité</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open(
            '/Index','Accueil','width=600,height=300'
            ); return false;">Termes d'utilisation</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open(
            '/Contact','Nous contacter','width=600,height=300'
            ); return false;">Nous contacter</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open(
            '/Index','Accueil','width=600,height=300'
            ); return false;">A propos de nous</a>
    </footer>
<script src="../../Public/js/menu.js"></script>

<script src="../../Public/js/logged.js"></script>
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

if ($_SESSION['login'] == 'ok') {
    echo '<script type="text/javascript">'
        . 'loggedMenu('.' \''. $_SESSION["Surname"] .'\' '.');'
        . '</script>';
}
echo $_SESSION['ProblemeLog'];
echo '<script type="text/javascript" src="../../Public/js/RedBorder.js"></script>';
if (isset($_SESSION['ProblemeLog']) && $_SESSION['ProblemeLog'] = 'BadLog') {
    echo '<script type="text/javascript">'
        . 'ErrorCall(' . ' \''
        . $_SESSION['ProblemeLog'] . '\' ' . ');'
        . '</script>';
}
unset($_SESSION['ProblemeLog']);
?>

</body>
</html>
