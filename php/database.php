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
    function CheckError($query,$nameArray){
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
                for($i = 1 ; $i <= count($nameArray) ; $i++){
                    echo $row[$nameArray[$i]] . '<br>';
                }
            }
        }
    }
}

$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');

$testArray = [
  "1" => "IdUser",
  "2" => "Password",
];

$databaseBaptiste->CheckError('Select IdUser,Password from User',$testArray);

?>