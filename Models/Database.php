<?php
require_once ('RequireAll.php');

class Database
{
    private $_host;
    private $_user;
    private $_password;
    private $_dbLink;

    function __construct($host, $user, $password, $dbName)
    {
        $this->_host = $host;
        $this->_user = $user;
        $this->_password = $password;
        $this->_dbLink = mysqli_connect($host, $user, $password)
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($this->_dbLink, $dbName)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($this->_dbLink)
        );
    }

    function CheckError($query)
    {
        $string2 = trim(str_ireplace('select', '', strstr($query, 'from', true)));
        $nameArray = explode(',', $string2);
        $newArray = array(0 => Null);
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

    function Comparator($query)
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

    function InsertUser(User $user)
    {
        $query = 'INSERT INTO User (Surname,Email,Password,Status) VALUES (\'' . $user->getPseudo() . '\',\'' . $user->getEmail() . '\',\'' . sha1($user->getPassword()) . '\',\'' . '2' . '\');';
        if (mysqli_query($this->_dbLink, $query)) {
            echo '<meta http-equiv="refresh" content="0;url=' . "/Thanks" . '" />';
//            header('Location : /Index');
        } else {
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }

    function Error($query)
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

    function Login(user $User)
    {
        $array = array(
            1 => "Password",
        );
        $query = 'Select Password from User Where Surname = \'' . $User->getPseudo() . '\' ';
        $dbResult = $this->Error($query);
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
                    $dbResult = $this->Error($query);
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

    function checkEmail($email)
    {
        $array = array(
            1 => "Email",
        );
        $query = 'Select Email from User Where Email = \'' . $email . '\' ';
        $dbResult = $this->Error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
            return false;
        } else {
            return true;
        }
    }

    function insertSqlMessage(Message $message)
    {
        $query = 'INSERT INTO message (idMessage,idUser,nameUser,message,time,idTopic) VALUES (\'' . $message->setIdMessage() . '\', 
            \'' . $message->getIdUser() . '\', 
            \'' . $message->getNameUser() . '\',
            \'' . $message->getMessage() . '\',
            \'' . $message->getTime() . '\',
            \'' . $message->getIdTopic() . '\'';
        if (mysqli_query($this->_dbLink, $query)) {
        } else {
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }

    function getAllTopic()
    {
        session_start();
        $query = 'Select IdTopic,NameTopic,Statut from Topics';
        $_SESSION['topicArray'] = array();
        $returnedArray = $this->CheckError($query);
        for ($i = 0; $i < count($this->CheckError($query)); $i = $i + 3) {
            array_push($_SESSION['topicArray'], new Topic($returnedArray[$i], $returnedArray[$i + 1], $returnedArray[$i + 2]));
        }
    }

    function getTopic($id)
    {
        $query = 'Select IdTopic,NameTopic,Statut from Topics where IdTopic = ' . '\'' . $id . '\'';
        $returnedArray = $this->CheckError($query);
        $topic = new Topic($returnedArray[0], $returnedArray[1], $returnedArray[2]);
        return $topic;
    }

    function getAllMessages($id)
    {
        $query = 'Select IdMessage,Statut,Content from Messages where IdTopic = ' . '\'' . $id . '\'';
        $array = array(1 => "IdMessage", 2 => "Statut", 3 => "Content");
        $_SESSION["messagesArray" . $id] = array();
        $returnedArray = $this->CheckError($query);
        for ($i = 0; $i < count($this->CheckError($query)); $i = $i + 3) {
            array_push($_SESSION['messagesArray' . $id], new Message($returnedArray[$i], $returnedArray[$i + 1], $returnedArray[$i + 2]));
        }
    }

    function addContentMsg($id, $newContent, $idUser)
    {
        $queryOne = 'Select Content,IdUsersCat from Messages where IdMessage = ' . '\'' . $id . '\'';
        $returnedArray = $this->CheckError($queryOne);
        print_r($returnedArray);

        $contentToAdd = $returnedArray[0] . $newContent;
        $userToAdd = $returnedArray[1] . "," . $idUser;

        $queryTwo = 'Update Messages SET Content = ' . '\'' . $contentToAdd . '\'' . 'where IdMessage = ' . '\'' . $id . '\'';
        $queryThree = 'Update Messages SET IdUsersCat = ' . '\'' . $userToAdd . '\'' . 'where IdMessage = ' . '\'' . $id . '\'';
        $this->Error($queryTwo);
        $this->Error($queryThree);
    }

    function updatePassword($email, $newPassword)
    {
        $query = 'Update User SET Password = ' . '\'' . $newPassword . '\'' . 'WHERE Email =' . '\'' . $email . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    function updateEmail($id, $newEmail)
    {
        $query = 'Update User SET Email = ' . '\'' . $newEmail . '\'' . 'WHERE IdUser =' . '\'' . $id . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    function getLastMessages($idTopic)
    {
        $queryOne = 'Select IdMessage from Messages where IdTopic =' . '\'' . $idTopic . '\'' . 'ORDER BY IdMessage DESC LIMIT 1';
        return $this->CheckError($queryOne)[0];
    }

    function newMessage($idTopic, $idUser)
    {
        $queryOne = 'Insert INTO Messages (IdTopic,IdUsersCat) VALUES ("' . $idTopic . '"' . ',"' . $idUser . '")';
        $this->Error($queryOne);
    }

    function newTopic($nameTopic)
    {
        $queryOne = 'Insert INTO Topics (NameTopic) VALUES ("' . $nameTopic . '")';
        mysqli_query($this->getDbLink(), $queryOne);
    }

    function getDbLink()
    {
        return $this->_dbLink;
    }

    function CloseMessage($id)
    {
        $query = 'Update Messages SET Statut = "0" WHERE IdMessage =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    function GetNumberTopic()
    {
        $query = 'Select count(IdTopic) from Topics';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdTopic)'];
    }

    function getLastMessageStatut($idTopic)
    {
        $query = 'Select Statut from Messages where IdTopic =' . '\'' . $idTopic . '\'' . 'ORDER BY IdMessage DESC LIMIT 1';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['Statut'];
    }

    function closeTopic($id)
    {
        $query = 'Update Topics SET Statut = "0" WHERE IdTopic =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    function deleteTopic($id)
    {
        $query = 'DELETE FROM Topics WHERE IdTopic =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    function requestIdUsersWritten($id)
    {
        $query = 'Select IdUsersCat from Messages WHERE IdMessage =' . '\'' . $id . '\'';
        return $this->CheckError($query)[0];
//        return mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
//        return $row;
//        return explode(',',$row['IdUsersCat']);
    }

    function CheckIdUserOnMessage($idMessage, $idUser)
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

    function getNumberMessage($idTopic)
    {
        $query = 'Select count(IdMessage) from Messages where IdTopic =' . '\'' . $idTopic . '\'';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdMessage)'];
    }

} // fin de la classe ===================================================================================================================================================
?>