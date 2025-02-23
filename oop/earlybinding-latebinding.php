<?php

class parentClass
{
    public function display()
    {
        echo "Parent class display() method called\n";
    }

    public function show()
    {
        // echo "Parent class show() method called\n";
        // $this->display(); // Late binding
        // static::display(); // Late binding
        self::display(); // Early binding
    }
}


class childClass extends parentClass
{
    public function display()
    {
        echo "Child class display() method called\n";
    }
}


$obj = new childClass();
$obj->show();

$obj = new parentClass();
$obj->show();