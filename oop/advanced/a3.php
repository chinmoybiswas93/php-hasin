<?php

/*
   magic method __get() and __set() are used to access and set the private properties of a class.

    __get() is called when we try to access a private property of a class.
    __set() is called when we try to set a private property of a class.
    __isset is called when we try to check if a private property exists or not.

   */

class MototCycle
{
    private $data = [];

    public function __construct($name, $cc, $color)
    {
        $this->data['name'] = $name;
        $this->data['cc'] = $cc;
        $this->data['color'] = $color;
    }

    public function __isset($name)
    {
        if (isset($this->data[$name])) {
            return true;
        } else {
            echo "Isset: Not found\n";
            return false;
        }
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            echo "Get: Not found\n";
            return null;
        }
    }
    public function __set($key, $value)
    {
        if (array_key_exists($key, $this->data)) {
            $this->data[$key] = $value;
        } else {
            trigger_error("Property not found", E_USER_WARNING);
        }
    }
}



$bike = new MototCycle('Yamaha', 150, 'Blue');
$bike->pooja = 'Pooja';
echo $bike->pooja;

