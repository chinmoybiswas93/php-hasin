
<?php
class Animal
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sleep()
    {
        echo "$this->name is sleeping\n";
    }

    public function eat()
    {
        echo "$this->name is eating\n";
    }

    public function greet()
    {
        echo "$this->name Greetings!\n";
    }
    protected function addTitle($title)
    {
        $this->name = $title . " " . $this->name;
    }
}

class Cat extends Animal
{
    function __construct($name)
    {
        $this->name = "Cat: " . $name;
        // echo "$name\n";
    }
    public function greet()
    {
        echo "$this->name Meow!\n";
    }
}

class Human extends Animal
{
    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->addTitle($title);
    }

    public function greet()
    {
        echo "Hello! I am $this->name\n";
    }
}

$golu = new Animal("Golu");
$golu->greet();

$tunu = new Cat("Tunu");
$tunu->greet();

$chinu = new Human("Chinmoy", "Mr.");
$chinu->greet();
