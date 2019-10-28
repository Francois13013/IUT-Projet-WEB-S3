<?php
//require_once ('Models/RequireAll.php');

//require_once('Tag.php');

class Message{
        private $_idMessage;
        private $_statut;
        private $_content;

    function __construct($id,$statut,$content)
    {
        $this->setIdMessage($id);
        $this->setStatut($statut);
        $this->setContent($content);
    }

    function setIdMessage($tmp){ $this->_idMessage = $tmp;}
    function setStatut($tmp){$this->_statut = $tmp;}
    function setContent($tmp){$this->_content = $tmp;}

    function getIdMessage(){return  $this->_idMessage;}
    function getstatut(){return  $this->_statut;}
    function getcontent(){return  $this->_content;}

}

?>