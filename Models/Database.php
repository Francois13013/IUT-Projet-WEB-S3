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

require_once 'RequireAll.php';

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
class Database
{
    private $_host;
    private $_user;
    private $_password;
    private $_dbLink;

    /**
     * Database constructor.
     *
     * @param $host     Description Param
     * @param $user     Description Param
     * @param $password Description Param
     * @param $dbName   Description Param
     */
    function __construct($host, $user, $password, $dbName)
    {
        $this->_host = $host;
        $this->_user = $user;
        $this->_password = $password;
        $this->_dbLink = mysqli_connect($host, $user, $password)
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($this->_dbLink, $dbName)
        or die(
            'Erreur dans la sélection de la base : ' . mysqli_error($this->_dbLink)
        );
    }

    /**
     * Description function
     *
     * @param $query description param
     *
     * @return array
     */
    function checkError($query)
    {
        $string2 = trim(str_ireplace('select', '', strstr($query, 'from', true)));
        $nameArray = explode(',', $string2);
        $newArray = array(0 => null);
        foreach ($nameArray as &$value) {
            $newArray[] = $value;
        }
        unset($newArray[0]);

        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête' . '<br/><br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {
            $returnArray = array();
            while ($row = mysqli_fetch_assoc($dbResult)) {
                for ($i = 1; $i <= count($newArray); $i++) {
                    array_push($returnArray, $row[$newArray[$i]]);
                }
            }
        }
        return $returnArray;
    }


    /**
     * Description function
     *
     * @param $query description param
     *
     * @return void
     */
    function comparator($query)
    {
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête' . '<br/><br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {
            if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
                return 0;
            } else {
                return 1;
            }
        }
    }


    /**
     * Description function
     *
     * @param User $user description param
     *
     * @return void
     */
    function insertUser(User $user)
    {
        $query = 'INSERT INTO User (Surname,Email,Password,Status) VALUES (\'' . $user->getPseudo() . '\',\'' . $user->getEmail() . '\',\'' . sha1($user->getPassword()) . '\',\'' . '2' . '\');';
        if (mysqli_query($this->_dbLink, $query)) {
            echo '<meta http-equiv="refresh" content="0;url=' . "/Thanks" . '" />';
            //            header('Location : /Index');
        } else {
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }

    /**
     * Description function
     *
     * @param $query description param
     *
     * @return bool|mysqli_result
     */
    function error($query)
    {
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête' . '<br/><br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        return $dbResult;
    }

    /**
     * Description function
     *
     * @param user $User description param
     *
     * @return void
     */
    function login(user $User)
    {
        $query = 'Select Password from User Where Surname = \'' . $User->getPseudo() . '\' ';
        $dbResult = $this->error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
            //            echo 'Utilisateur Introuvable';
            $_SESSION['ProblemeLog'] = 'BadLog';
            header('Location: /Index');
            exit();
        } else {
            if (mysqli_fetch_assoc($dbResult)['Password'] == sha1($User->getPassword())) {
                session_start();
                $_SESSION["login"] = 'ok';

                $array = array(
                    1 => "IdUser",
                    2 => "Surname",
                    3 => "Email",
                    4 => "Password",
                    5 => "Status",
                );
                for ($i = 1; $i <= count($array); $i++) {
                    $query = 'Select ' . $array[$i] . ' from User Where Surname = \'' . $User->getPseudo() . '\' ';
                    $dbResult = $this->error($query);
                    $_SESSION[$array[$i]] = mysqli_fetch_assoc($dbResult)[$array[$i]];
                }
                $User = new User($_SESSION["Surname"], $_SESSION["Email"], $_SESSION["Password"], $_SESSION["IdUser"], $_SESSION["Status"]);
                $_SESSION['user'] = $User;
                unset($_SESSION['ProblemeLog']);
                header('Location: /Index');
                exit();
            } else {
                //                echo 'mdp invalide';
                $_SESSION['ProblemeLog'] = 'BadLog';
                header('Location: /Index');
                exit();
            }
        }
    }

    /**
     * Description function
     *
     * @param $email description param
     *
     * @return void
     */
    function checkEmail($email)
    {
        $query = 'Select Email from User Where Email = \'' . $email . '\' ';
        $this->error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Description function
     *
     * @return void
     */
    function getAllTopic()
    {
        session_start();
        $query = 'Select IdTopic,NameTopic,Statut from Topics';
        $_SESSION['topicArray'] = array();
        $returnedArray = $this->checkError($query);
        for ($i = 0; $i < count($this->checkError($query)); $i = $i + 3) {
            array_push($_SESSION['topicArray'], new Topic($returnedArray[$i], $returnedArray[$i + 1], $returnedArray[$i + 2]));
        }
    }

    /**
     * Description function
     *
     * @param $id description param
     *
     * @return void
     */
    function getTopic($id)
    {
        $query = 'Select IdTopic,NameTopic,Statut from Topics where IdTopic = ' . '\'' . $id . '\'';
        $returnedArray = $this->checkError($query);
        $topic = new Topic($returnedArray[0], $returnedArray[1], $returnedArray[2]);
        return $topic;
    }

    /**
     * Description function
     *
     * @param $id description param
     *
     * @return void
     */
    function getAllMessages($id)
    {
        $query = 'Select IdMessage,Statut,Content from Messages where IdTopic = ' . '\'' . $id . '\'';
        $array = array(1 => "IdMessage", 2 => "Statut", 3 => "Content");
        $_SESSION["messagesArray" . $id] = array();
        $returnedArray = $this->checkError($query);
        for ($i = 0; $i < count($this->checkError($query)); $i = $i + 3) {
            array_push($_SESSION['messagesArray' . $id], new Message($returnedArray[$i], $returnedArray[$i + 1], $returnedArray[$i + 2]));
        }
    }

    /**
     * Description function
     *
     * @param $id         description param
     * @param $newContent description param
     * @param $idUser     description param
     *
     * @return void
     */
    function addContentMsg($id, $newContent, $idUser)
    {
        $queryOne = 'Select Content,IdUsersCat from Messages where IdMessage = ' . '\'' . $id . '\'';
        $returnedArray = $this->checkError($queryOne);
        print_r($returnedArray);

        $contentToAdd = $returnedArray[0] . $newContent;
        $userToAdd = $returnedArray[1] . "," . $idUser;

        $queryTwo = 'Update Messages SET Content = ' . '\'' . $contentToAdd . '\'' . 'where IdMessage = ' . '\'' . $id . '\'';
        $queryThree = 'Update Messages SET IdUsersCat = ' . '\'' . $userToAdd . '\'' . 'where IdMessage = ' . '\'' . $id . '\'';
        $this->error($queryTwo);
        $this->error($queryThree);
    }

    /**
     * Description function
     *
     * @param $email       description param
     * @param $newPassword description param
     *
     * @return void
     */
    function updatePassword($email, $newPassword)
    {
        $query = 'Update User SET Password = ' . '\'' . $newPassword . '\'' . 'WHERE Email =' . '\'' . $email . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    /**
     * Description function
     *
     * @param $id       desc param
     * @param $newEmail desc param
     *
     * @return void
     */
    function updateEmail($id, $newEmail)
    {
        $query = 'Update User SET Email = ' . '\'' . $newEmail . '\'' . 'WHERE IdUser =' . '\'' . $id . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    /**
     * Description function
     *
     * @param $idTopic desc param
     *
     * @return void
     */
    function getLastMessages($idTopic)
    {
        $queryOne = 'Select IdMessage from Messages where IdTopic =' . '\'' . $idTopic . '\'' . 'ORDER BY IdMessage DESC LIMIT 1';
        return $this->checkError($queryOne)[0];
    }

    /**
     * Description function
     *
     * @param $idTopic desc param
     * @param $idUser  desc param
     *
     * @return void
     */
    function newMessage($idTopic, $idUser)
    {
        $queryOne = 'Insert INTO Messages (IdTopic,IdUsersCat) VALUES ("' . $idTopic . '"' . ',"' . $idUser . '")';
        $this->error($queryOne);
    }

    /**
     * Description function
     *
     * @param $nameTopic desc param
     *
     * @return void
     */
    function newTopic($nameTopic)
    {
        $queryOne = 'Insert INTO Topics (NameTopic) VALUES ("' . $nameTopic . '")';
        mysqli_query($this->getDbLink(), $queryOne);
    }

    /**
     * Description function
     *
     * @return false|mysqli
     */
    function getDbLink()
    {
        return $this->_dbLink;
    }

    /**
     * Description function
     *
     * @param $id desc param
     *
     * @return void
     */
    function closeMessage($id)
    {
        $query = 'Update Messages SET Statut = "0" WHERE IdMessage =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Description function
     *
     * @return mixed
     */
    function getNumberTopic()
    {
        $query = 'Select count(IdTopic) from Topics';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdTopic)'];
    }

    /**
     * Description function
     *
     * @param $idTopic Description
     *
     * @return mixed
     */
    function getLastMessageStatut($idTopic)
    {
        $query = 'Select Statut from Messages where IdTopic =' . '\'' . $idTopic . '\'' . 'ORDER BY IdMessage DESC LIMIT 1';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['Statut'];
    }

    /**
     * Description function
     *
     * @param $id Description
     *
     * @return void
     */
    function closeTopic($id)
    {
        $query = 'Update Topics SET Statut = "0" WHERE IdTopic =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Description function
     *
     * @param $id Description
     *
     * @return void
     */
    function deleteTopic($id)
    {
        $query = 'DELETE FROM Topics WHERE IdTopic =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Description function
     *
     * @param $id Description
     *
     * @return void
     */
    function requestIdUsersWritten($id)
    {
        $query = 'Select IdUsersCat from Messages WHERE IdMessage =' . '\'' . $id . '\'';
        return $this->checkError($query)[0];
        //        return mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        //        return $row;
        //        return explode(',',$row['IdUsersCat']);
    }

    /**
     * Description function
     *
     * @param $idMessage Description
     * @param $idUser    Description
     *
     * @return bool
     */
    function checkIdUserOnMessage($idMessage, $idUser)
    {
        $array = $this->requestIdUsersWritten($idMessage);
        $arraytwo = explode(',', $array);
        foreach ($arraytwo as &$value) {
            if ($value == $idUser) {
                return true;
            }
        }
        return false;
    }

    /**
     * Description function
     *
     * @param $idTopic Description
     *
     * @return mixed
     */
    function getNumberMessage($idTopic)
    {
        $query = 'Select count(IdMessage) from Messages where IdTopic =' . '\'' . $idTopic . '\'';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdMessage)'];
    }

} // fin de la classe ===================================================================================================================================================
