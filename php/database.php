<?php

class database {
    private $_host;
    private $_user;
    private $_password;
    private $_dbLink;

    function __construct($host,$user,$password,$dbName)
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

    function CheckError($query,$name,$name2,$name3,$name4,$name5,$name6){

        if(!($dbResult = mysqli_query($this->_dbLink, $query)))
        {
            echo 'Erreur de requête' . '<br/><br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        if(!($dbResult = mysqli_query($this->_dbLink, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        } else {
            while ($row = mysqli_fetch_assoc($dbResult)) {
                  echo $row['\'' . $name . '\''] . '<br>';
                  if($name2!=''){ echo $row['\'' . $name2 . '\''] . '<br>'; }
                  if($name3!=''){ echo $row['\'' . $name3 . '\''] . '<br>'; }
                  if($name4!=''){ echo $row['\'' . $name4 . '\''] . '<br>'; }
                  if($name5!=''){ echo $row['\'' . $name5 . '\''] . '<br>'; }
                  if($name6!=''){ echo $row['\'' . $name6 . '\''] . '<br>'; }
//                echo $row['password'] . '<br><hr>';
            }
        }
    }
}


//$dbLink = mysqli_connect('mysql-baptistesevilla.alwaysdata.net', '189826_admin1', '0651196362')
//or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
//mysqli_select_db($dbLink, 'francois_bd1');
////or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
//$query = 'SELECT * FROM User';
////echo $query;

$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
$databaseBaptiste->CheckError('Select Script from Topics',Script);

//if(!($dbResult = mysqli_query($dbLink, $query)))
//{
////    echo 'Erreur de requête<br/>';
//    // Affiche le type d'erreur.
////    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
//    // Affiche la requête envoyée.
//    echo 'Requête : ' . $query . '<br/>';
//    exit();
//} else {
//    while ($row = mysqli_fetch_assoc($dbResult)) {
//        echo $row['id'] . '<br>';
////        echo $row['email'] . '<br>';
////        echo $row['password'] . '<br><hr>';
//    }
//}


//
//$database1 = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0621013579','User');
//$database1->CheckError()//

?>