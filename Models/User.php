<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * PHP VERSION 7.1
 *
 * @category   JeSaisPas
 * @package    WordPress
 * @subpackage Mytheme
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       ****
 * @since      1.0.0
 */

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


    /**
     * Description function
     *
     * @return mixed
     */
    function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getPassword()
    {
        return $this->_password;
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getId()
    {
        return $this->_id;
    }

    /**
     * Description function
     *
     * @return mixed
     */
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



    function checkPassword()
    {
        if (strlen($this->_password) < 8 || strlen($this->_password)>16) {
            return false;
        } else {
            return true;
        }
    }

    function checkEmail()
    {
        if (preg_match("/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i", $this->getEmail()) == true
            && $this->checkEmailHost($this->getEmail()) == true
            && strlen($this->_email) < 32
        ) {
                return true;
        } else {
            return false;
        }
    }

    function emailAlreadyExist()
    {
        $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
        $query = 'Select Email from User Where Email = \'' . $this->_email . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    function checkPseudo()
    {
        if (strlen($this->_pseudo) < 3 || strlen($this->_pseudo)>16) {
            return false;
        } else {
            return true;
        }
    }

    function pseudoAlreadyExist()
    {
        $databaseBaptiste = new Database('mysql-francois.alwaysdata.net', 'francois_project', '0621013579', 'francois_user');
        $query = 'Select Surname from User Where Surname = \'' . $this->_pseudo . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    function checkUser()
    {
        session_start();
        $return = true;

        if ($this->emailAlreadyExist() == false) {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .=',EmailExistant';
            } else {
                $_SESSION['Probleme'] = "EmailExistant";
            }
            $return = false;
        }

        if ($this->pseudoAlreadyExist() == false) {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .=',PseudoExistant';
            } else {
                $_SESSION['Probleme'] = "PseudoExistant";
            }
            $return = false;
        }

        if ($this->checkPassword() == false) {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .=',Password';
            } else {
                $_SESSION['Probleme'] = "Password";
            }
            $return = false;
        }

        if ($this->checkEmail() == false) {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .=',Email';
            } else {
                $_SESSION['Probleme'] = "Email";
            }
            $return = false;
        }

        if ($this->checkPseudo() == false) {
            if (isset($_SESSION['Probleme'])) {
                $_SESSION['Probleme'] .=',Pseudo';
            } else {
                $_SESSION['Probleme'] = "Pseudo";
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
