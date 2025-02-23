<?php
class planet
{
    public $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getname()
    {
        echo "Planet name is {$this->name}\n";
    }
}