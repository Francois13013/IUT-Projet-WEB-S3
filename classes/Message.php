<?php

    class Message{
        function __construct($text)
        {
            echo $text . '<br><hr>' ;
        }
    }
    $message = new Message ('hac');
?>