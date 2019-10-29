<?php
/**
 * Creation des objets messages
 *
 * PHP VERSION 7.2.22
 *
 * @category   Models
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */


//require_once ('Models/RequireAll.php');

/**
 * Class Message
 *
 * @category MVC
 * @package  MVC
 * @author   François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
 */
class Message
{
        private $_idMessage;
        private $_statut;
        private $_content;


    /**
     * Message constructor.
     *
     * @param $id      Id du message
     * @param $statut  Status du message
     * @param $content Son contenu
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
     * Attribut une valeur à la variable d'instance idMessage
     *
     * @param $tmp Valeur temporaire à attribuer
     *
     * @return void
     */
    function setIdMessage($tmp)
    {
        $this->_idMessage = $tmp;
    }

    /**
     * Attribut une valeur à la variable d'instance statut
     *
     * @param $tmp Valeur temporaire à attribuer
     *
     * @return void
     */
    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }

    /**
     * Attribut une valeur à la variable d'instance content
     *
     * @param $tmp Valeur temporaire à attribuer
     *
     * @return void
     */
    function setContent($tmp)
    {
        $this->_content = $tmp;
    }


    /**
     * Récupère la variable d'instance privée idMessage
     *
     * @return idMessage
     */
    function getIdMessage()
    {
        return  $this->_idMessage;
    }

    /**
     * Récupère la variable d'instance privée statut
     *
     * @return statut
     */
    function getstatut()
    {
        return  $this->_statut;
    }

    /**
     * Récupère la variable d'instance privée content
     *
     * @return content
     */
    function getcontent()
    {
        return  $this->_content;
    }

}

