<?php
class Animal
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sleep()
    {
        echo "$this->name is sleeping";
    }

    public function eat()
    {
        echo "$this->name is eating";
    }

    public function greet()
    {
        echo "Greetings!";
    }
}




$tunu = new Animal("Tunu");
$tunu->greet();