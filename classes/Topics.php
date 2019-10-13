<?php
require_once('Database.php');
require_once('User.php');


//session_start();
//class Topics
//{
//    private $_idTopics = '';
//    private $_idCreator = '';
//    private $_surname = '';
//    private $_nameTopics = '';
//    private $_date = '';
//    private $_time= '';
//    private $_script = '';
////    function __construct($_Surname,$_NameTopics,$_Date,$_Time,$_Script){
////        $this->setIdUser($_Surname);
////        $this->setNameTopics($_NameTopics);
////        $this->setDate($_Date);
////        $this->setTime($_Time);
////        $this->setScript($_Script);
////    }
//
//
//    function __construct(user $user, $_nameTopics)
//    {
//        $this->setIdUser($user->getId());
//        $this->setNameTopics($_nameTopics);
//        $this->setNameTopics($_nameTopics);
//    }
//
//    function  getIdUser(){return $this-> _surname;}
//    function  getNameTopics(){return $this-> _nameTopics;}
//    function  getDate(){return $this-> _date;}
//    function  getTime(){return $this-> _time;}
//    function  getScript(){return $this-> _script;}
//    function  setSurname($tmpSurname){ $this-> surname = $tmpSurname;}
//    function  setNameTopics($tmpNameTopics){ $this-> nametopics = $tmpNameTopics;}
//    function  setDate($tmpDate){ $this-> date_= $tmpDate;}
//    function  setTime($tmpTime){ $this->_time = $tmpTime;}
//    function  setScript($tmpScript){ $this->_script = $tmpScript;}
//    function CheckTopics ()
//    {
//        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
//        $query = 'Select NameTopics from Topics Where NameTopics = \'' . $this->_nametopics . '\' ';
//        if($databaseBaptiste->Comparator($query) == 1) {return false;}
//        return true;
//    }
//}



class Topics { //passer la class topics en mvc avec Controller de topics qui call et rewrite l'appche.
    private $_idTopics;
    private $_topicsName;
    private $_message = array();
    private $_maxMessage;
    private $_statut;
    private $_maxWords;
    function __construct($id,$name,$message){

        $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USERNAME,PASSWORD);
        $stmt = $pdo->query('SELECT name FROM users');
        while ($row = $stmt->fetch())
        {
            echo $row['name'] . "\n";
        }
//        $this->createIdTopics(); //request en sql l'id de la base vu qu'il est en auto increment insert un nouveau et le recupere avec l'AI

        // call message constructor en boucle


    }
    function createIdTopics(){

    }
    function requestAllMessage(){

    }
    function toggleStatut(){
        if($this->_statut == false){$this->_statut = true;}
        if($this->_statut == true){$this->_statut = false;}
    }
    function CheckTopics ()
    {
        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
        $query = 'Select NameTopics from Topics Where NameTopics = \'' . $this->_topicsName . '\' ';
        if($databaseBaptiste->Comparator($query) == 1) {return false;}
        return true;
    }

}