<?php
require_once('database.php');
session_start();
class Topics
{
    private $_idTopics = '';
    private $_surname = '';
    private $_nameTopics = '';
    private $_date = '';
    private $_time= '';
    private $_script = '';
//    function __construct($_Surname,$_NameTopics,$_Date,$_Time,$_Script){
//        $this->setIdUser($_Surname);
//        $this->setNameTopics($_NameTopics);
//        $this->setDate($_Date);
//        $this->setTime($_Time);
//        $this->setScript($_Script);
//    }


    function __construct(user $user, $_nameTopics)
    {

    }

    function  getIdUser(){return $this-> surname;}
    function  getNameTopics(){return $this-> nameTopics;}
    function  getDate(){return $this-> date;}
    function  getTime(){return $this-> time;}
    function  getScript(){return $this-> script;}
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
        return true;
    }
}