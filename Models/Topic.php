<?php
/**
 * Manipulation des Topics
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

require_once 'RequireAll.php';
//require_once 'Database.php';
//require_once 'User.php';

/**
 * Class Topic
 *
 * @category MVC
 * @package  MVC
 * @author   François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
 */
class Topic
{
    private $_idTopic = '';
    private $_nameTopic = '';
    private $_status = '';

    /**
     * Topic constructor.
     *
     * @param $_idTopics   Id du Topic
     * @param $_nameTopics Nom du Topic
     * @param $_status     Status (ouvert ou fermé)
     *
     * @return void
     */
    function __construct($_idTopics, $_nameTopics, $_status)
    {
        $this->setIdTopic($_idTopics);
        $this->setNameTopic($_nameTopics);
        $this->setStatus($_status);
    }

    /**
     * Récupère la variable d'instance privée idTopics
     *
     * @return idTopics
     */
    function getIdTopic()
    {
        return $this->_idTopic;
    }

    /**
     * Récupère la variable d'instance privée nameTopic
     *
     * @return nameTopic
     */
    function getNameTopic()
    {
        return $this->_nameTopic;
    }

    /**
     * Récupère la variable d'instance privée status
     *
     * @return status
     */
    function getStatus()
    {
        return $this->_status;
    }


    /**
     * Attribut une nouvelle valeur a idTopic
     *
     * @param $tmp Valeur de l'Id Topic
     *
     * @return void
     */
    function setIdTopic($tmp)
    {
        $this->_idTopic = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a nameTopic
     *
     * @param $tmp Valeur de nameTopic
     *
     * @return void
     */
    function setNameTopic($tmp)
    {
        $this->_nameTopic = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a status
     *
     * @param $tmp Valeur de status
     *
     * @return void
     */
    function setStatus($tmp)
    {
        $this->_status = $tmp;
    }
}// Fin de classe
