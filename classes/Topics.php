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


//class Topics
//{ //passer la class topics en mvc avec Controller de topics qui call et rewrite l'appche.
//
//    private $_idTopics = '';
//    private $_nameTopics = '';
//    private $_statut = '';
//
//    function __construct($_idTopics, $_nameTopics, $_statut)
//    {
//        $this->setIdTopics($_idTopics);
//        $this->setNameTopics($_nameTopics);
//        $this->setStatut($_statut);
//
//
////
////        function __construct($id, $name, $message)
////        {
////
////            $dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USERNAME, PASSWORD);
////            $stmt = $pdo->query('SELECT  FROM users');
////            while ($row = $stmt->fetch()) {
////                echo $row['name'] . "\n";
////            }
////        $this->createIdTopics(); //request en sql l'id de la base vu qu'il est en auto increment insert un nouveau et le recupere avec l'AI
//
//            // call message constructor en boucle
//
//
//        }
//
//        function CheckError()
//        {
//
//        }
//
//        function createIdTopics(Topics $topics)
//        {
//            $query = 'INSERT INTO Topics (Surname, NameTopics, Date, Time, Sctipt) VALUES (\'' . $topics->NameTopics() . '\',\'' . $user->getEmail() . '\',\'' . sha1($user->getPassword()) . '\',\'' . '2' . '\');';
//            if (mysqli_query($this->_dbLink, $query)) {
//                echo '<meta http-equiv="refresh" content="0;url=' . "/Thanks" . '" />';
////            header('Location : /Index');
//            } else {
//                echo 'erreur' . mysqli_error($this->_dbLink);
//            }
//
//        }
//
//        function requestAllMessage()
//        {
//
//        }
//
//        function toggleStatut()
//        {
//            if ($this->_statut == false) {
//                $this->_statut = true;
//            }
//            if ($this->_statut == true) {
//                $this->_statut = false;
//            }
//        }
//
//        function CheckTopics()
//        {
//            $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362', 'baptistesevilla_projetweb');
//            $query = 'Select NameTopics from Topics Where NameTopics = \'' . $this->_topicsName . '\' ';
//            if ($databaseBaptiste->Comparator($query) == 1) {
//                return false;
//            }
//            return true;
//        }
//
//    }
//
//}

class Topic
{ //passer la class topics en mvc avec Controller de topics qui call et rewrite l'appche.

    private $_idTopics = '';
    private $_nameTopics = '';
    private $_statut = '';

    function __construct($_idTopics, $_nameTopics, $_statut)
    {
        $this->setIdTopics($_idTopics);
        $this->setNameTopics($_nameTopics);
        $this->setStatut($_statut);
    }

    function getIdTopic(){return $this->_idTopics;}
    function getNameTopics(){return $this->_nameTopics;}
    function getStatut(){return $this->_statut;}



    function setIdTopics($tmp)
    {
        $this->_idTopics = $tmp;}

    function setNameTopics($tmp)
    {
        $this->_nameTopics = $tmp;}

    function setStatut($tmp)
    {
        $this->_statut = $tmp;}
    }

    function showTopic(){
        $database = new database('mysql-francois.alwaysdata.net','francois_oui','0621013579','francois_project');
        $fullArray = $database->getAllTopic();
        print_r($fullArray);
//        foreach($fullArray as &$value){
//            $value =
//        }
    }
?>