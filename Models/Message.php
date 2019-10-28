<?php
//require_once ('Models/RequireAll.php');

//require_once('Tag.php');


//    class Message{
//        private $_idMessage;
//        private $_idUser;
//        private $_nameUser;
//        private $_message;
//        private $_time;
//        private $_mainDiv;
//        private $_idTopic;
//
//        function __construct($text,$id,$name)
//        {
//            $this->_message = $text;
//            $this->_idMessage = $id;
//            $this->_nameUser = $name;
//            $id = new Tag ('p',$id,'','nomuser');
//            $name = new Tag ('p',$name,'','nomuser');
//            $infodiv = new Tag('div',$name . $id,'','divinfomessage');
//            $content = new Tag('p',$this->_message,'','textmessage');
//            $this->_mainDiv = new Tag('div',$content . $infodiv ,'','message');
//        }
//
//
//        function  getIdMessage(){return $this->_idMessage;}
//        function  getIdUser(){return $this->_idUser;}
//        function  getIdTopic(){return $this->_idTopic;}
//        function  getNameUser(){return $this->_nameUser;}
//        function  getTime(){return $this->_time;}
//        function  getMainDiv(){return $this->_mainDiv;}
//        function  getMessage(){return $this->_message;}
//
//        function  setIdMessage($tmp){$this->_idMessage = $tmp;}
//        function  setIdUser($tmp){ $this->_idUser = $tmp;}
//        function  setIdTopic($tmp){ $this->_idTopic = $tmp;}
//        function  setNameUser($tmp){ $this->_nameUser = $tmp;}
//        function  setTime($tmp){ $this->_time = $tmp;}
//        function  setMainDiv($tmp){ $this->_mainDiv = $tmp;}
//        function  setMessage($tmp){$this->_message = $tmp;}
//
//        function addText($text){
////            echo $this->_message;
////            echo $text;
//            $this->_message = $this->_message . $text;
////            echo $this->_message;
//
//        }
////        function __toString()
////        {
////            // TODO: Implement __toString() method.
////            return $this->_message;
////        }
//        function show(){
////            unset($this);
//            echo $this->_message . '<br><hr>';
//        }
//    }
//    $message = new Message ('testzad','1','abd');
//    $message->show();
//    $message->addText('rajout');
//    $message->show();

class Message{
        private $_idMessage;
        private $_statut;
        private $_content;

    function __construct($id,$statut,$content)
    {
        $this->setIdMessage($id);
        $this->setStatut($statut);
        $this->setContent($content);
    }

    function setIdMessage($tmp){ $this->_idMessage = $tmp;}
    function setStatut($tmp){$this->_statut = $tmp;}
    function setContent($tmp){$this->_content = $tmp;}

    function getIdMessage(){return  $this->_idMessage;}
    function getstatut(){return  $this->_statut;}
    function getcontent(){return  $this->_content;}

}

?>