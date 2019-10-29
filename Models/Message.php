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


//require_once ('Models/RequireAll.php');
//require_once('Tag.php');

/**
 *  Description de la classe.
 *
 * Class Message
 *
 * @category Test
 * @package  Test
 * @author   Test <test@test.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     Test
 */
class Message
{
        private $_idMessage;
        private $_statut;
        private $_content;


    /**
     * Message constructor.
     *
     * @param $id      Description Param
     * @param $statut  Description Param
     * @param $content Description Param
     *
     * @return void
     */
    function __construct($id,$statut,$content)
    {
        $this->setIdMessage($id);
        $this->setStatut($statut);
        $this->setContent($content);
    }

    /**
     * Description function
     *
     * @param $tmp description param
     *
     * @return void
     */
    function setIdMessage($tmp)
    {
        $this->_idMessage = $tmp;
    }

    /**
     * Description function
     *
     * @param $tmp description param
     *
     * @return void
     */
    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }

    /**
     * Description function
     *
     * @param $tmp description param
     *
     * @return void
     */
    function setContent($tmp)
    {
        $this->_content = $tmp;
    }


    /**
     * Description function
     *
     * @return mixed
     */
    function getIdMessage()
    {
        return  $this->_idMessage;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getstatut()
    {
        return  $this->_statut;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getcontent()
    {
        return  $this->_content;
    }

}

