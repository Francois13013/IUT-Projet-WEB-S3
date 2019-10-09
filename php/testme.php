<!---->
<?php
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
    $strstrEmail = strstr($email, '@');
    echo $strstrEmail . "<br>";
    for ($i = 1; $i <= count($array); $i++) {
        print_r($array[$i]);
        if ($strstrEmail == $array[$i]) {
            return false;
            break;
        } else if ($i== count($array)){
            return true;
        }
    }

}

checkEmailHost('test@univ-amu.fr');