<?php
class Tag
{
    private $_type;
    private $_html;

    /**
     * Tag constructor.
     * @param $type
     * @param string $content
     * @param $id
     * @param $class
     */
    function __construct($type, $content,$id,$class)
    {
        $this->_type = $type;
        $this->_html = '<' . $type;
        if($id != ""){ $this->_html .= ' id= "' . $id . '"'; }
        if($class != ""){ $this->_html .= ' class= "' . $class . '"'; }
        $this->_html .= '>';
        if(isset($content)){$this->_html .= $content;}
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
}
