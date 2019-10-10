<?php

require_once ('database.php');
session_start();

class Topics
{
    private $_IdTopics = '';
    private $_Surname = '';
    private $_NameTopics = '';
    private $_Date = '';
    private $_Time= '';
    private $_Script = '';
    function __construct($_Surname,$_NameTopics,$_Date,$_Time,$_Script){
        $this->setIdUser($_Surname);
        $this->setNameTopics($_NameTopics);
        $this->setDate($_Date);
        $this->setTime($_Time);
        $this->setScript($_Script);

    }

    function  getIdUser(){return $this-> Surname;}
    function  getNameTopics(){return $this-> NameTopics;}
    function  getDate(){return $this-> Date;}
    function  getTime(){return $this-> Time;}
    function  getScript(){return $this-> Script;}

    function  setSurname($tmpSurname){ $this-> surname = $tmpSurname;}
    function  setNameTopics($tmpNameTopics){ $this-> nametopics = $tmpNameTopics;}
    function  setDate($tmpDate){ $this-> date_= $tmpDate;}
    function  setTime($tmpTime){ $this->_time = $tmpTime;}
    function  setScript($tmpScript){ $this->_script = $tmpScript;}

    function CheckTopics ()
    {
        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
        $query = 'Select NameTopics from Topics Where NameTopics = \'' . $this->_nametopics . '\' ';
        if($databaseBaptiste->Comparator($query) == 1) {return false;}

    }

}