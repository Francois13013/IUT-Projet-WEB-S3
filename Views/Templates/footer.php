</div>
<link rel="stylesheet" href="../../Public/css/stylefooter.css">
    <footer id="footer">
        <a>Copyright Iut Informatique ©</a>
        <div class="Personne">
            <a href="https://github.com/florentRmd">Florent Reymond</a>
        </div>
        <div class="Personne">
            <a href="https://github.com/corentinplee">Corentin Plee</a>
        </div>
        <div class="Personne">
            <a href="https://github.com/Baptiste-Sevilla">Baptiste Sevilla</a>
        </div>
        <div class="Personne">
            <a href="https://github.com/francoisAlHaddad">François Al Haddad-Siderikoudis</a>
        </div>
        <a class="bottom" href="#" onClick="MyWindow=window.open(
            '/AboutUs','A propos de nous','width=600,height=300'
            ); return false;"></a>
    </footer>
<script src="../../Public/js/menu.js"></script>
<script src="../../Public/js/Discussion.js"></script>
<script src="../../Public/js/popup.js"></script>
<script src="../../Public/js/logged.js"></script>
<script>
    showPopup();
</script>
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
