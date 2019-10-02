<?php
function CreateInput($name,$value,$type,$textadd){
    $html = '<input ';
    if($name!='') $html .= 'name="' . $name . '"';
    if($type!='') $html .= 'type="' . $type . '"';
    if($value!='') $html .= 'value="' . $value . '"';
    $html .= '>'.$textadd;
    if($type!='hidden') $html .= '<br>';
    $html .= PHP_EOL;
    echo $html;
}

class Tag{
    function __construct($type, $content = '')
    {
        $html = '<' . $type . '>';
        $html .= $content;
        $html .= '</' . $type . '>';
    }

    function GetReturn() {
        return $this;
    }
}

function InsertInto($tag,$tagtoinsert){

}

class chat {
    private $_id;
    /**
     * chat constructor.
     */
    function __construct()
    {
        $_div1 = new Tag('div');
        $testtostring = $_div1->GetReturn();
        echo $testtostring;
//        $_div2 = new Tag('div', $_div1);
//        echo new Tag('div', $_div2).toString();
        $_input = CreateInput('textbox','','text','');
    }
}

$ChatTmp = new chat();