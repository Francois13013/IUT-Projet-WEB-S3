<?php
/**
 * Controller de la view Index
 * Détruit la session en cours
 * Et actualise la page
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

session_start();
session_unset();
session_destroy();
header('Location: /Index');
exit();
