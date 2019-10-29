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


require_once 'Database.php';
require_once 'User.php';

/**
 *  Description de la classe.
 *
 * Class Database
 *
 * @category Test
 * @package  Test
 * @author   Test <test@test.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     Test
 */
class Topic
{

    //passer la class topics en mvc avec Controller de topics qui call et
    // rewrite l'appche.

    private $_idTopics = '';
    private $_nameTopics = '';
    private $_statut = '';

    /**
     * Topic constructor.
     *
     * @param $_idTopics   Description param
     * @param $_nameTopics Description param
     * @param $_statut     Description param
     *
     * @return void
     */
    function __construct($_idTopics, $_nameTopics, $_statut)
    {
        $this->setIdTopics($_idTopics);
        $this->setNameTopics($_nameTopics);
        $this->setStatut($_statut);
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getIdTopic()
    {
        return $this->_idTopics;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getNameTopics()
    {
        return $this->_nameTopics;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getStatut()
    {
        return $this->_statut;
    }


    /**
     * Description fonction
     *
     * @param $tmp Description Param
     *
     * @return void
     */
    function setIdTopics($tmp)
    {
        $this->_idTopics = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description Param
     *
     * @return void
     */
    function setNameTopics($tmp)
    {
        $this->_nameTopics = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description Param
     *
     * @return void
     */
    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }
}

/**
 * Description fonction
 *
 * @return void
 */
function showTopic()
{
    $database = new Database(
        'mysql-francois.alwaysdata.net',
        'francois_oui',
        '0621013579',
        'francois_project'
    );
    $database->getAllTopic();
}
