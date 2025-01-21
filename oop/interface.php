<?php
interface BaseAnimal
{
    function isAlive();
    function canEat($p1, $p2);
    function breed();
}

class Animal implements BaseAnimal
{
    public $life;

    public function __construct($life)
    {
        $this->life = $life;
    }

    function isAlive()
    {
        if ($this->life > 1) {
            echo "I Am Alive\n";
        } else {
            echo "Dead I am\n";
        }
    }
    function canEat($p1, $p2)
    {
    }
    function breed()
    {
    }
}

interface BaseHuman extends BaseAnimal
{
    function canTalk();
}

class Human implements BaseHuman
{
    public $life;

    public function __construct($life)
    {
        $this->life = $life;
    }

    function isAlive()
    {
        if ($this->life > 1) {
            echo "I Am Alive\n";
        } else {
            echo "Dead I am\n";
        }
    }
    function canEat($p1, $p2)
    {
    }
    function breed()
    {
    }
    function canTalk()
    {
        echo "I am a human\n";
    }
}


$mycat = new Animal(17);
$mycat->isAlive();

$rony = new Human('19');
$rony->canTalk();