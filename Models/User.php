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

/**
 *  Description de la classe.
 *
 * Class Database
 *
 * @category Test
 * @package  Test
 * @author   Test <test@test.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     Test
 */
class User
{
    private $_pseudo;
    private $_email = '';
    private $_password = '';
    private $_id = '';
    private $_statut = '';

    /**
     * User constructor.
     *
     * @param $pseudo    Description param
     * @param $_email    Description param
     * @param $_password Description param
     * @param $_id       Description param
     * @param $_statut   Description param
     *
     * @return void
     */
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

    /**
     * Description fonction
     *
     * @param $tmp Description param
     *
     * @return void
     */
    function setPseudo($tmp)
    {
        $this->_pseudo = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description param
     *
     * @return void
     */
    function setEmail($tmp)
    {
        $this->_email = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description param
     *
     * @return void
     */
    function setPassword($tmp)
    {
        $this->_password = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description param
     *
     * @return void
     */
    function setId($tmp)
    {
        $this->_id = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $tmp Description param
     *
     * @return void
     */
    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }

    /**
     * Description fonction
     *
     * @param $email Description param
     *
     * @return bool
     */
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

        //preg_match( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)
        //*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)
        //*\.[a-zA-Z]{2,4}$/ " , $email ) ) {

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


    /**
     * Description fonction
     *
     * @return bool
     */
    function checkPassword()
    {
        if (strlen($this->_password) < 8 || strlen($this->_password)>16) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Description fonction
     *
     * @return bool
     */
    function checkEmail()
    {
        if (preg_match(
            "/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i",
            $this->getEmail()
        ) == true
            && $this->checkEmailHost($this->getEmail()) == true
            && strlen($this->_email) < 32
        ) {
                return true;
        } else {
            return false;
        }
    }

    /**
     * Description fonction
     *
     * @return bool
     */
    function emailAlreadyExist()
    {
        $databaseBaptiste = new Database(
            'mysql-francois.alwaysdata.net',
            'francois_project',
            '0621013579',
            'francois_user'
        );
        $query = 'Select Email from User Where Email = \'' . $this->_email . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    /**
     * Description fonction
     *
     * @return bool
     */
    function checkPseudo()
    {
        if (strlen($this->_pseudo) < 3 || strlen($this->_pseudo)>16) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Description fonction
     *
     * @return bool
     */
    function pseudoAlreadyExist()
    {
        $databaseBaptiste = new Database(
            'mysql-francois.alwaysdata.net',
            'francois_project',
            '0621013579',
            'francois_user'
        );
        $query = 'Select Surname from User Where Surname = \''
            . $this->_pseudo . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    /**
     * Description fonction
     *
     * @return bool
     */
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

        return $return;
    }
}
