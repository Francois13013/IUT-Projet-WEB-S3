<?php
require_once('Tag.php');


    class Message{
        private $_idMessage;
        private $_idUser;
        private $_nameUser;
        private $_message;
        private $_time;
        private $_mainDiv;

        function __construct($text,$id,$name)
        {
            $this->_message = $text;
            $this->_idMessage = $id;
            $this->_nameUser = $name;
            $id = new Tag ('p',$id,'','nomuser');
            $name = new Tag ('p',$name,'','nomuser');
            $infodiv = new Tag('div',$name . $id,'','divinfomessage');
            $content = new Tag('p',$this->_message,'','textmessage');
            $this->_mainDiv = new Tag('div',$content . $infodiv ,'','message');
        }
        function addText($text){
//            echo $this->_message;
//            echo $text;
            $this->_message = $this->_message . $text;
//            echo $this->_message;

        }
//        function __toString()
//        {
//            // TODO: Implement __toString() method.
//            return $this->_message;
//        }
        function show(){
//            unset($this);
            echo $this->_message . '<br><hr>';
        }
    }
    $message = new Message ('testzad','1','abd');
    $message->show();
    $message->addText('rajout');
    $message->show();
?>