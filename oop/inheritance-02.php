<?php
abstract class Shape
{
    protected $name, $area;

    public function __construct($name)
    {
        $this->name = $name;
        $this->calculateArea();
    }

    public function getArea()
    {
        echo "This {$this->name}'s Area is {$this->area}\n";
    }

    abstract protected function calculateArea();
}


class Triangle extends Shape
{
    private $a, $b, $c;
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;

        parent::__construct('Triangle');
    }

    public function getArea()
    {
        // echo "This {$this->name}'s Area is {$this->area}\n";
        printf("This %s's Area is %0.2f\n", $this->name, $this->area);
    }

    protected function calculateArea()
    {
        $p = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
    }
}

class Rectangle extends Shape
{
    private $a, $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;

        parent::__construct('Rectangle');
    }
    protected function calculateArea()
    {

        $this->area = $this->a * $this->b;
    }
}


$r1 = new Rectangle(4, 5);
$r1->getArea();

$t1 = new Triangle(4, 5, 6);
$t1->getArea();
