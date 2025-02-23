<?php

class MototCycle
{
    private $data = [];

    public function __construct($name, $cc, $color)
    {
        $this->data['name'] = $name;
        $this->data['cc'] = $cc;
        $this->data['color'] = $color;
    }

    // public function __isset($name)
    // {
    //     if (isset($this->data[$name])) {
    //         return true;
    //     } else {
    //         echo "Property not found\n";
    //         return false;
    //     }
    // }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return null;
        }
    }
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
}



$bike = new MototCycle('Yamaha', 150, 'Blue');
var_dump($bike->pooja);

