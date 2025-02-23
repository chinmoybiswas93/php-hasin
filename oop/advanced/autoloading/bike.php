<?php
class bike
{
    public $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function ride()
    {
        echo "I am riding a bike\n";
    }
}
