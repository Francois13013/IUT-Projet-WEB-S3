<?php
function CreateInput($name,$value,$type,$textadd)
{
    $html = '<input ';
    if($name!='') { $html .= 'name="' . $name . '"';
    }
    if($type!='') { $html .= 'type="' . $type . '"';
    }
    if($value!='') { $html .= 'value="' . $value . '"';
    }
    $html .= '>'.$textadd;
    if($type!='hidden') { $html .= '<br>';
    }
    $html .= PHP_EOL;
    echo $html;
}

class Tag
{
    private $_type;
    private $_html;

    /**
     * Tag constructor.
     * @param $type
     * @param string $content
     */
    function __construct($type, $content = '')
    {
        $this->_type = $type;
        $this->_html = '<' . $type . '>';
        $this->_html .= $content;
        $this->_html .= '</' . $type . '>';
    }

    function getType()
    {
        return $this->_type;
    }

    function getHTML()
    {
        return $this->_html;
    }

    function __toString()
    {
        return $this->_html;
    }
}

//function InsertInto($tag,$tagtoinsert){
//
//}

class tchat
{
    private $_id;
    /**
     * chat constructor.
     */
    function __construct()
    {
        $tagTest = new Tag('div');
        echo $tagTest;
        //        $testtostring = $_div1->GetReturn();
        //        echo $testtostring; //
        //        $_div2 = new Tag('div', $_div1);
        //        echo new Tag('div', $_div2).toString();
        $_input = CreateInput('textbox', '', 'text', '');
    }
}

$ChatTmp = new tchat();