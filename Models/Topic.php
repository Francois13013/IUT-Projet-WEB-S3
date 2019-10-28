<?php
require_once 'Database.php';
require_once 'User.php';

class Topic
{

    //passer la class topics en mvc avec Controller de topics qui call et rewrite l'appche.

    private $_idTopics = '';
    private $_nameTopics = '';
    private $_statut = '';

    function __construct($_idTopics, $_nameTopics, $_statut)
    {
        $this->setIdTopics($_idTopics);
        $this->setNameTopics($_nameTopics);
        $this->setStatut($_statut);
    }

    function getIdTopic()
    {
        return $this->_idTopics;
    }
    function getNameTopics()
    {
        return $this->_nameTopics;
    }
    function getStatut()
    {
        return $this->_statut;
    }



    function setIdTopics($tmp)
    {
        $this->_idTopics = $tmp;
    }

    function setNameTopics($tmp)
    {
        $this->_nameTopics = $tmp;
    }

    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }
}

function showTopic()
{
    $database = new Database('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579', 'francois_project');
    $database->getAllTopic();
}
