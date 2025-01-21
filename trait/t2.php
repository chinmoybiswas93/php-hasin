<?php
trait MyTrait
{
    static $number;
    abstract function sayHi();
}

class MyClassA
{
    use MyTrait;

    function sayHi()
    {
        echo 'Hello A';
    }
}

class MyClassB
{
    use MyTrait;

    function sayHi()
    {
        echo 'Hello B';
    }
}


MyClassA::$number = 3;
MyClassB::$number = 13;
// echo MyClassA::$number;

$ns1 = new MyClassA();
$ns2 = new MyClassB();

// $ns1::$number = 5;
// $ns2::$number = 15;

echo $ns1::$number;
echo $ns2::$number;