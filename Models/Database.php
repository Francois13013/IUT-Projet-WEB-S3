<?php
/**
 * Fichier qui permet de gerer les base de donnée du site.
 * Element central du site
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

/**
 * Class Database
 *
 * @category MVC
 * @package  MVC
 * @author   François Al Haddad Siderikoudis <FrancoisAlHaddad@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     *
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
     * @param $host     Adresse de l'hote
     * @param $user     Nom d'utilisateur de la bd
     * @param $password Mot de passe
     * @param $dbName   Nom de la table dans la bd
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
     * Verifie la requete sql l'execute
     *
     * @param $query Requête a executer
     *
     * @return array Resultat(s) de la requête
     */
    function checkError($query)
    {
        $string2 = trim(
            str_ireplace(
                'select',
                '',
                strstr($query, 'from', true)
            )
        );
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
//            exit();
        }
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
//            exit();
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
     * Verifie si la requête renvoie une donnée ou pas
     *
     * @param $query Requête a executer
     *
     * @return bool
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
     * Ajout une instance d'user en base de donnée
     *
     * @param User $user Utilisateur à ajouter
     *
     * @return void
     */
    function insertUser(User $user)
    {
        $query = 'INSERT INTO User (Surname,Email,Password,Status) VALUES (\'' .
            $user->getPseudo() .
            '\',\'' . $user->getEmail() .
            '\',\'' . sha1($user->getPassword()) .
            '\',\'' . '2' . '\');';
        if (mysqli_query($this->_dbLink, $query)) {
            echo '<meta http-equiv="refresh" content="0;url=' . "/Thanks" . '" />';
            //            header('Location : /Index');
        } else {
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }
    /**
     * Verifie la requete l'execute et renvoie une donnée simple
     *
     * @param $query Requête a executer
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
//            exit();
        }
        if (!($dbResult = mysqli_query($this->_dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
//            exit();
        }
        return $dbResult;
    }

    /**
     * Verifie dans la base de donnée un utilisateur qui souhaite se connecter
     * en le comparant grâce à ses identifiants
     * si la connection reussi place dans les variables $_SESSION les "bonnes"
     * valeurs
     *
     * @param user $User Une instance d'un utilisateur qui souhaite se connecter
     *
     * @return void
     */
    function login(user $User)
    {
        $query = 'Select Password from User Where Surname = \'' .
            $User->getPseudo() . '\' ';
        $dbResult = $this->error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
            //            echo 'Utilisateur Introuvable';
            $_SESSION['ProblemeLog'] = 'BadLog';
            header('Location: /Index');
            exit();
        } else {
            if (mysqli_fetch_assoc($dbResult)['Password'] == sha1(
                $User->getPassword()
            )
            ) {
                //                session_start();
                $_SESSION["login"] = 'ok';

                $array = array(
                    1 => "IdUser",
                    2 => "Surname",
                    3 => "Email",
                    4 => "Password",
                    5 => "Status",
                );
                for ($i = 1; $i <= count($array); $i++) {
                    $query = 'Select ' . $array[$i] .
                        ' from User Where Surname = \'' .
                        $User->getPseudo() . '\' ';
                    $dbResult = $this->error($query);
                    $_SESSION[$array[$i]]
                        = mysqli_fetch_assoc($dbResult)[$array[$i]];
                }
                $User = new User(
                    $_SESSION["Surname"],
                    $_SESSION["Email"],
                    $_SESSION["Password"],
                    $_SESSION["IdUser"],
                    $_SESSION["Status"]
                );
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
     * @param $email
     * @return bool
     */
    function test14(){
        echo 'test';
    }

//    /**
//     * Verifie si l'email est déjà existant
//     *
//     * @param $email Email à vérifier
//     *
//     * @return bool
//     */
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
     * Recupere les topics dans la bd les instancies et les places dans une varible
     * $_SESSION
     *
     * @return void
     */
    function getAllTopic()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $query = 'Select IdTopic,NameTopic,Statut from Topics';
        $_SESSION['topicArray'] = array();
        $returnedArray = $this->checkError($query);
        for ($i = 0; $i < count($this->checkError($query)); $i = $i + 3) {
            array_push(
                $_SESSION['topicArray'],
                new Topic(
                    $returnedArray[$i],
                    $returnedArray[$i + 1],
                    $returnedArray[$i + 2]
                )
            );
        }
    }

    /**
     * Recupère un objet topic en fonction d'un Id depuis la base de donnée
     *
     * @param $id description param
     *
     * @return Topic
     */
    function getTopic($id)
    {
        $query = 'Select IdTopic,NameTopic,Statut from Topics where IdTopic = ' .
            '\'' . $id . '\'';
        $returnedArray = $this->checkError($query);
        $topic = new Topic($returnedArray[0], $returnedArray[1], $returnedArray[2]);
        return $topic;
    }

    /**
     * Instancies les objet messages d'un topic depuis la base de donnée
     * Pour les ajouter dans une variable $_SESSION
     *
     * @param $id Id du Topic
     *
     * @return void
     */
    function getAllMessages($id)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $query = 'Select IdMessage,Statut,Content from Messages where IdTopic = ' .
            '\'' . $id . '\'';
        $array = array(1 => "IdMessage", 2 => "Statut", 3 => "Content");
        $_SESSION["messagesArray" . $id] = array();
        $returnedArray = $this->checkError($query);
        for ($i = 0; $i < count($this->checkError($query)); $i = $i + 3) {
            array_push(
                $_SESSION['messagesArray' . $id],
                new Message(
                    $returnedArray[$i],
                    $returnedArray[$i + 1],
                    $returnedArray[$i + 2]
                )
            );
        }
    }

    /**
     * Récupère le contenu d'un message par son Id le concatene avec le texte à
     * ajouter
     * Puis pour tracer l'utilisateur ajoute l'id user de la personne qui realise
     * l'opération
     *
     * @param $id         Id du Message
     * @param $newContent Le contenu à ajouter
     * @param $idUser     L'id de l'utilisateur qui relaise l'action
     *
     * @return void
     */
    function addContentMsg($id, $newContent, $idUser)
    {
        $queryOne = 'Select Content,IdUsersCat from Messages where IdMessage = ' .
            '\'' . $id . '\'';
        $returnedArray = $this->checkError($queryOne);
        //        print_r($returnedArray);

        $contentToAdd = $returnedArray[0] . $newContent;
        $userToAdd = $returnedArray[1] . "," . $idUser;

        $queryTwo = 'Update Messages SET Content = ' . '\'' . $contentToAdd .
            '\'' . 'where IdMessage = ' .
            '\'' . $id . '\'';
        $queryThree = 'Update Messages SET IdUsersCat = ' . '\'' . $userToAdd .
            '\'' . 'where IdMessage = ' .
            '\'' . $id . '\'';
        $this->error($queryTwo);
        $this->error($queryThree);
    }

    /**
     * Met a jour le mot de passe dans la base de donnée
     *
     * @param $email       Email de l'utilisateur
     * @param $newPassword Nouveau mot de passe
     *
     * @return void
     */
    function updatePassword($email, $newPassword)
    {
        $query = 'Update User SET Password = ' . '\'' . $newPassword .
            '\'' . 'WHERE Email ='
            . '\'' . $email . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    /**
     * Met a jour l'adresse email dans la base de donnée
     *
     * @param $id       Id de l'utilisateur
     * @param $newEmail Nouvelle adresse mail
     *
     * @return void
     */
    function updateEmail($id, $newEmail)
    {
        $query = 'Update User SET Email = ' . '\'' . $newEmail .
            '\'' . 'WHERE IdUser =' .
            '\'' . $id . '\'';
        mysqli_query($this->_dbLink, $query);
    }

    /**
     * Obtient l'id du dernier message du Topic
     *
     * @param $idTopic Id du topic
     *
     * @return Id
     */
    function getLastMessages($idTopic)
    {
        $queryOne = 'Select IdMessage from Messages where IdTopic =' .
            '\'' . $idTopic . '\'' .
            'ORDER BY IdMessage DESC LIMIT 1';
        return $this->checkError($queryOne)[0];
    }

    /**
     * Ajoute un nouveau message
     *
     * @param $idTopic Id du topic
     * @param $idUser  Id de utilisateur qui realise l'operation
     *
     * @return void
     */
    function newMessage($idTopic, $idUser)
    {
        $queryOne = 'Insert INTO Messages (IdTopic,IdUsersCat) VALUES
            ("' . $idTopic . '"' . ',"' . $idUser . '")';
        //        $this->error($queryOne);
        mysqli_query($this->_dbLink, $queryOne);
    }

    /**
     * Ajoute un topic dans la bd
     *
     * @param $nameTopic Nom du topic
     *
     * @return void
     */
    function newTopic($nameTopic)
    {
        $queryOne = 'Insert INTO Topics (NameTopic) VALUES ("' . $nameTopic . '")';
        mysqli_query($this->getDbLink(), $queryOne);
    }

    /**
     * Récupère l'attribut privé DbLink de l'objet courant
     *
     * @return false|mysqli
     */
    function getDbLink()
    {
        return $this->_dbLink;
    }

    /**
     * Marque le status d'un message à ferme dans la base de donnée
     *
     * @param $id Id du message
     *
     * @return void
     */
    function closeMessage($id)
    {
        $query = 'Update Messages SET Statut = "0" WHERE IdMessage =' .
            '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Récupère le nombre de topic en cours ouvert
     *
     * @return mixed
     */
    function getNumberTopicOpen()
    {
        $query = 'Select count(IdTopic) from Topics WHERE Statut = "1"';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdTopic)'];
    }

    /**
     * Récupère le nombre de topic sur la base de donnée
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
     * Obtient le status du dernier message d'un topic
     *
     * @param $idTopic Id Topic
     *
     * @return mixed
     */
    function getLastMessageStatut($idTopic)
    {
        $query = 'Select Statut from Messages where IdTopic =' . '\'' .
            $idTopic . '\'' . 'ORDER BY IdMessage DESC LIMIT 1';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['Statut'];
    }

    /**
     * Met le status d'un topic à ferme dans la bd
     *
     * @param $id Id du topic
     *
     * @return void
     */
    function closeTopic($id)
    {
        $query = 'Update Topics SET Statut = "0" WHERE IdTopic =' .
            '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Supprime le topic par son id
     *
     * @param $id Id Topic
     *
     * @return void
     */
    function deleteTopic($id)
    {
        $query = 'DELETE FROM Topics WHERE IdTopic =' . '\'' . $id . '\'';
        mysqli_query($this->getDbLink(), $query);
    }

    /**
     * Récupère la liste des utilisateurs qui ont écrit sur un message grâce à son
     * Id
     *
     * @param $id Id Message
     *
     * @return void
     */
    function requestIdUsersWritten($id)
    {
        $query = 'Select IdUsersCat from Messages WHERE IdMessage ='
            . '\'' . $id . '\'';
        return $this->checkError($query)[0];
    }

    /**
     * Verifie si utilisateur à écrit sur un message via son ID
     *
     * @param $idMessage Id du message
     * @param $idUser    Id de l'utilisateur
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
     * Récupère le nombre de message d'un topic
     *
     * @param $idTopic Id Topic
     *
     * @return Int
     */
    function getNumberMessage($idTopic)
    {
        $query = 'Select count(IdMessage) from Messages where IdTopic ='
            . '\'' . $idTopic . '\'';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row['count(IdMessage)'];
    }

    /**
     * Obtenir le top des topics, a finir de com
     *
     * @return array
     */
    function getTopTopic()
    {
        $query = 'Select IdTopic from Messages group by IdTopic
            order by count(IdTopic) DESC LIMIT 3;';
        $row = mysqli_fetch_assoc(mysqli_query($this->getDbLink(), $query));
        return $row[0];
    }

    /**
     *  Remplacement d'un trigger lors de la suppression d'un topic
     * pour supprimer tous les messages du topic
     *
     * @param $idTopic Id du topic
     *
     * @return void
     */
    function insteadOfTrigger($idTopic)
    {
        $query = 'Delete FROM Messages where Messages.IdTopic =' . '\''
            . $idTopic . '\'';
        mysqli_query($this->getDbLink(), $query);
    }
}
?>