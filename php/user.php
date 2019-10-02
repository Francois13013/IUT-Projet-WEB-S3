<?php

class user {
    private $_name;
    private $_surname;
    private $_email;
    private $_password;
    private $_id;
    private $_statut;
    function __construct($_name,$_surname,$_email,$_password,$_id,$_statut){
        $this->setName($_name);
        $this->setSurname($_surname);
        $this->setEmail($_email);
        $this->setPassword($_password);
        $this->setId($_id);
        $this->setStatut($_statut);
    }
    function  getName(){return $this->_name;}
    function  getSurname(){return $this->_surname;}
    function  getEmail(){return $this->_email;}
    function  getPassword(){return $this->_password;}
    function  getId(){return $this->_id;}
    function  getStatut(){return $this->_statut;}

    function  setName($tmpName){ $this->_name = $tmpName;}
    function  setSurname($tmpSurname){ $this->_surname = $tmpSurname;}
    function  setEmail($tmpEmail){ $this->_email = $tmpEmail;}
    function  setPassword($tmpPassword){ $this->_password = $tmpPassword;}
    function  setId($tmpId){ $this->_id = $tmpId;}
    function  setStatut($tmpStatut){ $this->_statut = $tmpStatut;}

    function getUser(){
      $this->getName();
      $this->getSurname();
      $this->getEmail();
      $this->getPassword();
      $this->getId();
      $this->getStatut();
    }
}

echo 'test';
?>
