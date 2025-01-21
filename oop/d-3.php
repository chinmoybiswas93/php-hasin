<?php
class Fruit
{
    public $name;
    protected $color;
    protected $weight;

    function set_name($n)
    {  // a public function (default)
        $this->name = $n;
    }
    public function set_color($n, $weight)
    { // a protected function
        $this->color = $n;
        $this->set_weight($weight);
        echo $this->color;
        echo $this->weight;
    }
    private function set_weight($n)
    { // a private function
        $this->weight = $n;
    }
}

$mango = new Fruit();
$mango->set_name('Mango'); // OK
// $mango->set_color('Yellow', 300); // ERROR
$mango->set_weight('300'); // ERROR