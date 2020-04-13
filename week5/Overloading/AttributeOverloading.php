<?php

class PropertyTest {

    private $data = array();
    public $declare = 1;
    private $hidden = 2;

    public function __set($name, $value) {
        echo "Setting '$name' to '$value' \n";
        $this->data[$name] = $value;
    }

    public function __get($name) {
        echo "Getting '$name' \n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        $trace = debug_backtrace();
        trigger_error(
                "Undefined property via __get(): " . $name
                . ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
        return null;
    }

    function __isset($name) {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    function __unset($name) {
        echo" Unsetting '$name'?";
        unset($this->data[$name]);
    }
    function getHidden(){
        return $this -> hidden;
    }
}
echo "<pre>\n";
$obj = new PropertyTest;
$obj -> a = 1;
echo $obj -> a . "\n\n";
var_dump(isset($obj -> a));
unset($obj->a);
var_dump(isset($obj -> a));
echo "\n";
echo $obj->declare. "\n\n";
echo "Let's experiment with the private property name 'hidden': \n";
echo "Privates are visible inside the class, so __get() not use... \n";
echo $obj->getHidden(). "\n";
echo "Privates not visible outside of class,, so __get() is used...\n";
echo $obj->hidden . "\n";
?>


