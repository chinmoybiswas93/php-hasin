<?php
class ParentClass
{
    function test()
    {
        echo "Parent class\n";
    }
}

trait MyTrait
{
    function test()
    {
        echo "Hello from Trait\n";
    }
}

class ChildClass extends ParentClass
{
    use MyTrait {
        MyTrait::test as sayHello;
    }
}

$child = new ChildClass();
$child->test(); // calls parent class method
$child->sayHello();