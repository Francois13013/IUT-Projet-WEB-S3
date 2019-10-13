<?php
require_once('Message.php');
require_once('User.php');

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
    function InsertUser(User $user){
        $query = 'INSERT INTO User (FirstName,LastName,Surname,Email,Password,Status) VALUES (\'' . $user->getFirstName() . '\', \'' . $user->getLastName() . '\', \'' . $user->getSurname() . '\',\'' . $user->getEmail() . '\',\'' . $user->getPassword() . '\',\'' . '2' . '\');';
        if(mysqli_query($this->_dbLink, $query)){
            echo '<meta http-equiv="refresh" content="0;url='. "/Thanks" .'" />';
        } else{
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }
    function Error($query){
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
        $query = 'Select Password from User Where Surname = \'' . $User->getSurname() . '\' ';
        $dbResult = $this->Error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
            header('Location: /Index');
            exit();
        } else {
            if(mysqli_fetch_assoc($dbResult)['Password'] == sha1($User->getPassword())){
                session_start();
                $_SESSION["login"] = 'ok';

                $array = array(
                    1 => "IdUser",
                    2 => "FirstName",
                    3 => "LastName",
                    4 => "Surname",
                    5 => "Email",
                    6 => "Password",
                    7 => "Status",
                );
                for($i = 1 ; $i <= count($array) ; $i++) {
                    $query = 'Select ' . $array[$i] . ' from User Where Surname = \'' . $User->getSurname() . '\' ';
                    $dbResult = $this->Error($query);
                    $_SESSION[$array[$i]] = mysqli_fetch_assoc($dbResult)[$array[$i]];
                }
                $User = new user($_SESSION["FirstName"],$_SESSION["LastName"],$_SESSION["Surname"],$_SESSION["Email"],$_SESSION["Password"],$_SESSION["IdUser"],$_SESSION["Status"]);
                $User = $_SESSION['user'];
                header('Location: /Index');
                exit();
            } else {
                header('Location: /error.php');
                exit();
            }
        }
    }
    function checkEmail($email){
        $array = array(
            1 => "Email",
        );
        $query = 'Select Email from User Where Email = \'' . $email . '\' ';
        $dbResult = $this->Error($query);
        if (mysqli_num_rows(mysqli_query($this->_dbLink, $query)) == 0) {
//            echo 'il y pas ton pseudo';
            return false;
        } else {
            return true;
        }
    }
    function insertSqlMessage(Message $message){
        $query = 'INSERT INTO message (idMessage,idUser,nameUser,message,time,idTopic) VALUES (\'' . $message->setIdMessage() . '\', 
            \'' . $message->getIdUser() . '\', 
            \'' . $message->getNameUser() . '\',
            \'' . $message->getMessage() . '\',
            \'' . $message->getTime() . '\',
            \'' . $message->getIdTopic() . '\',';
        if(mysqli_query($this->_dbLink, $query)){
        } else{
            echo 'erreur' . mysqli_error($this->_dbLink);
        }
    }
}

//function shellSqlRequest($string)
//{
//    $arrayName = [];
//    $string = strtolower($string);
//    $string2 = trim(str_replace('select', '', strstr($string, 'from', true)));
//    // une soluce : $arrayName = explode(',',$string2);
//
//    // nombre de virgules + 1
//    $string2 .= ',';
//    // on a plus besoin de +1
//    $commas = substr_count($string2, ',');
//    echo 'commas: ';
//    print_r($commas);
//    echo PHP_EOL;
//    for ($a = 0; $a < $commas; $a++) {
//        $tmp = '';
//        // récupérer la chaine placée avant la virgule
//        for ($t = 0; $t < strpos($string2, ",") ; $t++) {
//            $tmp .= $string2[$t];
//        }
//        echo 'tmp: ';
//        print_r($tmp);
//        echo PHP_EOL;
//        echo 'string2: ';
//        $string2 = substr($string2,strpos($string2, ",")+1);
//        print_r($string2);
//        echo PHP_EOL;
//
//        array_push($arrayName, $tmp);
//    }
//
//    return $arrayName;
//}
//
//
//$data = 'SELECT id, username, password FROM table';
//
//print_r(shellSqlRequest($data));
//
//
//$data = 'SELECT * FROM table';
//
//print_r(shellSqlRequest($data));


// => {0=>'id', 1=>'username', 2=>'password'}pgp tep








/*
//$databaseBaptiste = new database('mysql-baptistesevilla.alwaysdata.net','189826_admin1','0651196362','baptistesevilla_projetweb');
//
//$testArray = [
//  "1" => "IdUser",
//  "2" => "Password",
//];
//
//$query = 'Select IdUser,Password from User';
//CheckError($query,$testArray);

//$query = 'Select IdUser,Password from User';
//$databaseBaptiste->CheckError($query,$testArray);
//$string2 = '';

function shellSqlRequest($string)
{
    $arrayName = [];
    $string2 = str_replace('Select', '', strstr($string, 'from', true));
    for ($a = 1; $a <= (substr_count($string, ',') + 1); $a++) {
        $tmp = NULL;
        for ($t = 0; $t <= strlen($string2); $t++) {
            $tmp .= $string2[$t];
            $string2 = strstr($string2, $string2[(strpos($string2, ",") + 1)]);
            print_r ($tmp);
        }
        echo '<br><hr>';

//        echo $tmp . '<br><hr>';
        array_push($arrayName, $tmp);
//        echo $arrayName[4];
    }
}


    //            if($a==(substr_count($string2,',') + 1)) {
//            } else {
//                $tmp = '';
//                for ($j = 0; $j < strpos($string2, ','); $j++){
////                    echo strpos($string2, ',');
//                    $tmp .= $string2[$j];
////                    echo $string2;
//                }
//                $string2 = strstr($string2, $string2[(strpos($string2, ','))]);
//                echo $string2[(strpos($string2, ',')) + 1];

//
//                echo $tmp . '<br><hr>';
//                array_push($arrayName,$tmp);
//            }
////        }
//    return $arrayName;




//$query = 'Select IdUser,Password,voice,un,test,zu,paif,dzada,hhzz,adza,hq,dzq,ywt,dz,wzd,grzge,tprohk from User';

//            echo $string2 . '<br><hr>';
//            shellSqlRequest($string2);
//            $tmpb = '';
//            for ($g = 0; $g < strpos($string2, ','); $g++) $tmpb .= $string2[$g];
//            $string2 = strstr($string2, $string2[(strpos($string2, ',')) + 1]);
//            echo $tmpb . '<br><hr>';
//            echo $string2 . '<br><hr>';



//shellSqlRequest($string2);

//        $tmpx = '';
//        for ($g = strpos($string2, ','); $g > 0; $g--) {
//            $tmpx .= $string2[$g];
//        }
//
//        echo $tmpx . '<br><hr>';
//
//        $tmpR = '';
//        for ($h = strlen($tmpx) ; $h != 0 ; $h--) {
//            echo $tmpx[$h];
//        }
//
//        echo $tmpR . '<br><hr>';

//        echo $tmpR . '<br>';


//        echo strlen($tmpx) . "<br>";
//        echo $tmpR. '<br>';
//        echo $string2 . '<br>';
//        echo strpos($string2, ',');
////        echo $tmp . '<br>';
////        echo $tmpx . '<br>';
//        $tmp2 = strstr($string2,',');
//        $tmp3 = str_replace(',','',$string2);
//        echo $tmp2 . '<br>';
//        echo $tmp3 . '<br>';

//        shellSqlRequest()

//$query2 = strstr($query,'from',true);
//$query3 = str_replace('Select', '',$query2);
//for($j = 0 ; $j < strpos($query3,','); $j++) {
//    $tmp .= $query3[$j];
//}
//$query3 = substr($query3,$j+1);;
//
//for($g = 0 ; $g < strpos($query3,','); $g++) {
//    $tmp2 .= $query3[$g];
//}
//
//$query3 = substr($query3,$g+1);;
//
//echo $tmp . '<br>';
//echo $tmp2;
//
//echo '<br>' .$query3;
//*/
?>