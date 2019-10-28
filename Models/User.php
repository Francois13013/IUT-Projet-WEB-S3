<?php

require_once 'Database.php';

session_start();

class User
{
    private $_pseudo;
    private $_email = '';
    private $_password = '';
    private $_id = '';
    private $_statut = '';
    function __construct($pseudo,$_email,$_password,$_id,$_statut)
    {
        $this->setPseudo($pseudo);
        $this->setEmail($_email);
        $this->setPassword($_password);
        $this->setId($_id);
        $this->setStatut($_statut);
    }

    function getPseudo()
    {
        return $this->_pseudo;
    }
    function getEmail()
    {
        return $this->_email;
    }
    function getPassword()
    {
        return $this->_password;
    }
    function getId()
    {
        return $this->_id;
    }
    function getStatut()
    {
        return $this->_statut;
    }

    function setPseudo($tmpSurname)
    {
        $this->_pseudo = $tmpSurname;
    }
    function setEmail($tmpEmail)
    {
        $this->_email = $tmpEmail;
    }
    function setPassword($tmpPassword)
    {
        $this->_password = $tmpPassword;
    }
    function setId($tmpId)
    {
        $this->_id = $tmpId;
    }
    function setStatut($tmpStatut)
    {
        $this->_statut = $tmpStatut;
    }
    function checkEmailHost($email)
    {
        $array = array(
            "1" => "@gmail.com",
            "2" => "@yahoo.fr",
            "3" => "@hotmail.fr",
            "4" => "@laposte.net",
            "5" => "@etu.univ-amu.fr",
            "6" => "@univ-amu.fr",
        );

        //        if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $email ) ) {
            $strstrEmail = strstr($email, '@');
        for ($i = 1; $i <= count($array); $i++) {
            if ($strstrEmail == $array[$i]) {
                return true;
                break;
            } else if ($i== count($array)) {
                return false;
            }

        }
    }



    function CheckPassword()
    {
        if(strlen($this->_password) < 8 || strlen($this->_password)>16) {
            return false;
        }else {
            return true;
        }
    }

    function CheckEmail()
    {
        if(preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $this->getEmail()) == true
            && $this->checkEmailHost($this->getEmail()) == true
            && strlen($this->_email) < 32
        ) {
                return true;
        } else {
            return false;
        }
    }

    function EmailAlreadyExist()
    {
        $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
        $query = 'Select Email from User Where Email = \'' . $this->_email . '\' ';
        if($databaseBaptiste->Comparator($query) == 1) {return false;
        }
        return true;
    }

    function CheckPseudo()
    {
        if(strlen($this->_pseudo) < 3 || strlen($this->_pseudo)>16) {
            return false;
        }else {
            return true;
        }
    }

    function PseudoAlreadyExist()
    {
        $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
        $query = 'Select Surname from User Where Surname = \'' . $this->_pseudo . '\' ';
        if($databaseBaptiste->Comparator($query) == 1) {return false;
        }
        return true;
    }

    function CheckUser()
    {
        session_start();
        $return = true;

        if($this->EmailAlreadyExist() == false) {
            if(isset($_SESSION['Probleme'])) { $_SESSION['Probleme'] .=',EmailExistant';
            } else {$_SESSION['Probleme'] = "EmailExistant";
            }
            $return = false;
        }

        if($this->PseudoAlreadyExist() == false) {
            if(isset($_SESSION['Probleme'])) { $_SESSION['Probleme'] .=',PseudoExistant';
            } else {$_SESSION['Probleme'] = "PseudoExistant";
            }
            $return = false;
        }

        if($this->CheckPassword() == false) {
            if(isset($_SESSION['Probleme'])) { $_SESSION['Probleme'] .=',Password';
            } else {$_SESSION['Probleme'] = "Password";
            }
            $return = false;
        }

        if($this->CheckEmail() == false) {
            if(isset($_SESSION['Probleme'])) { $_SESSION['Probleme'] .=',Email';
            } else {$_SESSION['Probleme'] = "Email";
            }
            $return = false;
        }

        if($this->CheckPseudo() == false) {
            if(isset($_SESSION['Probleme'])) { $_SESSION['Probleme'] .=',Pseudo';
            } else {$_SESSION['Probleme'] = "Pseudo";
            }
            $return = false;
        }

        //        if(strpos($this->_email,'@') == 0){return false;}

        //        echo $this . '<br><hr>';
        //        if($this->checkEmailHost($this->getEmail()) == false) {return false;} /* || '@yahoo.fr' || '@laposte.net'*/
        //        if() {return false;}
        //        echo $this . '<br><hr>';

        return $return;
    }
}
