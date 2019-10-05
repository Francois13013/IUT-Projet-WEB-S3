<?php
include_once('database.php');
class user {
    private $_firstName;
    private $_lastName;
    private $_surname;
    private $_email;
    private $_password;
    private $_id;
    private $_statut;
    function __construct($_firstName,$_lastName,$_surname,$_email,$_password,$_id,$_statut){
        $this->setFirstName($_firstName);
        $this->setlastName($_lastName);
        $this->setSurname($_surname);
        $this->setEmail($_email);
        $this->setPassword($_password);
        $this->setId($_id);
        $this->setStatut($_statut);
    }

    function  getFirstName(){return $this->_firstName;}
    function  getLastName(){return $this->_lastName;}
    function  getSurname(){return $this->_surname;}
    function  getEmail(){return $this->_email;}
    function  getPassword(){return $this->_password;}
    function  getId(){return $this->_id;}
    function  getStatut(){return $this->_statut;}

    function  setFirstName($tmpName){ $this->_firstName = $tmpName;}
    function  setLastName($tmpName){ $this->_lastName = $tmpName;}
    function  setSurname($tmpSurname){ $this->_surname = $tmpSurname;}
    function  setEmail($tmpEmail){ $this->_email = $tmpEmail;}
    function  setPassword($tmpPassword){ $this->_password = $tmpPassword;}
    function  setId($tmpId){ $this->_id = $tmpId;}
    function  setStatut($tmpStatut){ $this->_statut = $tmpStatut;}

    function CheckUser(){
        $databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
        $testArray = [
            "1" => "IdUser",
            "2" => "Password",
            "3" => "Email"
        ];
//        $query = 'Select IdUser,Password,Email from User Where Surname = \'' . $this->_surname . '\' ';
//        $databaseBaptiste->CheckError($query,$testArray);
        $query = 'Select Surname from User Where Surname = \'' . $this->_surname . '\' ';
        echo $databaseBaptiste->Comparator($query);
    }
    function __toString()
    {
        $html = $this->getName() . ' ';
        $html .= $this->getSurname(). ' ';
        $html .= $this->getEmail(). ' ';
        $html .=$this->getPassword(). ' ';
        $html .=$this->getId(). ' ';
        $html .=$this->getStatut(). ' ';
        return $html;
    }
}

//update git

//$test = new user('','test','coco@test.fr','test','1','utilisateur');
$test2 = new user('Baptiste','Sevilla','Baptiste13','baptiste@test.fr','test','2','admin');
//
//$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
//$databaseBaptiste->InsertUser($test2);

$test2->CheckUser();



//echo $test;
//echo $test2;
?>
