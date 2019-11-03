<?php
/**
 * Traitement des utilisateurs
 *
 * PHP VERSION 7.2.22
 *
 * @category   Models
 * @package    Standard
 * @subpackage Standard
 * @author     François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       *
 * @since      1.0.0
 */

require_once 'RequireAll.php';
//require_once 'Database.php';

session_start();

/**
 * Class User
 *
 * @category MVC
 * @package  MVC
 * @author   François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
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
     * @param $pseudo    Pseudo de l'utilisateur
     * @param $_email    Email de l'utilisateur
     * @param $_password Mot de passe de l'utilisateur
     * @param $_id       Id de l'utilisateur
     * @param $_statut   Status de l'utilisateur
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
     * Récupère la variable d'instance privée pseudo
     *
     * @return pseudo
     */
    function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * Récupère la variable d'instance privée email
     *
     * @return email
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * Récupère la variable d'instance privée password
     *
     * @return password
     */
    function getPassword()
    {
        return $this->_password;
    }

    /**
     * Récupère la variable d'instance privée Id
     *
     * @return Id
     */
    function getId()
    {
        return $this->_id;
    }

    /**
     * Récupère la variable d'instance privée statut
     *
     * @return statut
     */
    function getStatut()
    {
        return $this->_statut;
    }

    /**
     * Attribut une nouvelle valeur a pseudo
     *
     * @param $tmp Valeur du pseudo
     *
     * @return void
     */
    function setPseudo($tmp)
    {
        $this->_pseudo = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a email
     *
     * @param $tmp Valeur de l'email
     *
     * @return void
     */
    function setEmail($tmp)
    {
        $this->_email = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a Password
     *
     * @param $tmp Valeur du Password
     *
     * @return void
     */
    function setPassword($tmp)
    {
        $this->_password = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a Id
     *
     * @param $tmp Valeur de l'Id
     *
     * @return void
     */
    function setId($tmp)
    {
        $this->_id = $tmp;
    }

    /**
     * Attribut une nouvelle valeur a Statut
     *
     * @param $tmp Valeur du Statut
     *
     * @return void
     */
    function setStatut($tmp)
    {
        $this->_statut = $tmp;
    }

    /**
     * Verifie si l'hebergeur de l'email est "connu"
     *
     * @param $email Email à vérifier
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
     * Vérifie si le mot de passe est entre 8 et 16 charactères
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
     * Vérifie la forme de la string si elle correspond bien à une adresse mail
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
     * Verifie si l'adresse Mail existe déjà dans la base de donnée
     *
     * @return bool
     */
    function emailAlreadyExist()
    {
        $databaseBaptiste = new Database(
            HOST,
            USER,
            PASSWORD,
            TABLENAME
        );
        $query = 'Select Email from User Where Email = \'' . $this->_email . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    /**
     * Verifie si le pseudo est entre 3 et 16 charatères
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
     * Verifie si le pseudo existe déjà dans la base de donnée
     *
     * @return bool
     */
    function pseudoAlreadyExist()
    {
        $databaseBaptiste = new Database(
            HOST,
            USER,
            PASSWORD,
            TABLENAME
        );
        $query = 'Select Surname from User Where Surname = \''
            . $this->_pseudo . '\' ';
        if ($databaseBaptiste->comparator($query) == 1) {
            return false;
        }
        return true;
    }

    /**
     * Verifie l'utilisateur en appelant toute les verifications (pseudo,mail...)
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
