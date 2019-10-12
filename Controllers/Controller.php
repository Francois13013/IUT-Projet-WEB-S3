<?php
class Controller {
    public static function CreateView($nameView){
        require_once("Views/$nameView.php");
    }
};
?>