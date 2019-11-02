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

require_once '../Models/RequireAll.php';

if (!empty($_POST['inputTextAdmin']) && isset($_POST['inputTextAdmin'])){
    $inputTextAdmin = $_POST['inputTextAdmin'];
    unset($_POST['inputTextAdmin']);
}
if (!empty($_POST['inputTextId']) && isset($_POST['inputTextId'])){
    $inputTextId = $_POST['inputTextId'];
    unset($_POST['inputTextId']);
}
if (!empty($_POST['inputTextPseudo']) && isset($_POST['inputTextPseudo'])){
    $inputTextPseudo = $_POST['inputTextPseudo'];
    unset($_POST['inputTextPseudo']);
}

//dblib:host=mysql-francois.alwaysdata.net;dbname=francois_project;charset=UTF-8francois_project0621013579

function Resultat(){
    $db = new PDO(
        'mysql:host=mysql-francois.alwaysdata.net;dbname=francois_project',
        'francois_project',
        '0621013579');

    $sql =  'SELECT * FROM User';
    foreach  ($db->query($sql) as $row) {
        print $row['IdUser'] . "\t";
        print  $row['Surname'] . "\t";
        print $row['IdUser'] . "\t";
        print  $row['Surname'] . "\t";
    }

//    $requetePrep = $db->prepare('SELECT * FROM User');
//    $res = $requetePrep->execute();
//    $db->query($requetePrep);
}

