<?php
//spl_autoload_register(function(){
////    require ('Models/Controller.php');
////    require ('./Models/Database.php');
////    require ('./Models/Message.php');
////    require ('./Models/Router.php');
////    require ('./Models/Tag.php');
////    require ('./Models/Topic.php');
////    require ('./Models/User.php');
//    require ('./Routes.php');
//
//});
//require ('Models/Controller.php');
//require ('./Models/Database.php');
//require ('./Models/Message.php');
//require ('./Models/Router.php');
//require ('./Models/Tag.php');
//require ('./Models/Topic.php');
//require ('./Models/User.php');

//spl_autoload_call(function(){
//
//
//});


function autoloadModel($className)
{
    if(isset($className)) {
        //    echo $_SERVER['REQUEST_URI'];
        //    echo __DIR__ . '<br>';
        $filename = 'Models/' . $className . '.php';
        $filename2 = __DIR__ . '/' . $className . '.php';

        //    $filename = str_replace('_', '/', $className).'.php';
        //    echo $className  . '<br>';
        //    echo $filename  . '<br>';
        //    echo $filename2  . '<br>';
        //    echo '<hr>';
        //    $filename2 = $filename
        //    $filename = "Models/" . $className . ".php";
        if (is_readable($filename)) {
            include_once $filename;
        } else if (is_readable($filename2)) {
            include_once $filename2;
        }
    } else {
        return;
    }
}

function autoloadController($className)
{
    if(isset($className)) {
        $filename = 'Models/' . $className . '.php';
        $filename2 = __DIR__ . '/' . $className . '.php';
    }
    if (is_readable($filename)) {
        include_once $filename;
    } else if (is_readable($filename2)) {
        include_once $filename2;
    } else {
        return;
    }
}

spl_autoload_register("autoloadModel");
//spl_autoload_register("autoloadController");

