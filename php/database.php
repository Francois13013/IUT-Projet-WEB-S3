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
        $_dbLink = mysqli_connect($host, $user, $password)
        or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
        mysqli_select_db($_dbLink, $dbName)
        or die('Erreur dans la sélection de la base : ' . mysqli_error($_dbLink)
        );
    }
    function CheckError($query){
        if(!($dbResult = mysqli_query($this->_dbLink, $query)))
        {
            echo 'Erreur de requête' . '<br/><br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
//echo $query;
        if(!($dbResult = mysqli_query($this->_dbLink, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->_dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
}


$dbLink = mysqli_connect('mysql-francois.alwaysdata.net', 'francois_oui', '0621013579')
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($dbLink, 'francois_bd1')
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
);
$query = 'SELECT id,email,password FROM user';
echo $query;

//$database1 = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0621013579','User');
//$database1->CheckError()

?>