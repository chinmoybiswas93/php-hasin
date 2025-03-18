<?php
/*
    PHP Trait method overriding Example
*/

trait NumberSeries1
{
    public function NumberSeriesA()
    {
        echo "NumberSeriesA From Trait\n";
    }
    public function NumberSeriesB()
    {
        echo "NumberSeriesB From Trait\n";
        parent::NumberSeriesB();
    }
}


class NumberSeriesClass
{
    public function NumberSeriesB()
    {
        echo "NumberSeriesB From Class\n";
    }
}

class NumberSeries extends NumberSeriesClass
{
    use NumberSeries1;
    // public function NumberSeriesB() 
    // {
    //     echo "NumberSeriesB From Class2\n";
    // }
}


$ns = new NumberSeries();
$ns->NumberSeriesB();