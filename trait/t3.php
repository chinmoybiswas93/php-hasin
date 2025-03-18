<?php
/*
    PHP Trait conflict resulation Example
*/

trait NumberSeries1
{
    public function NumberSeriesA()
    {
        echo "NumberSeriesA From Trait-1\n";
    }
}

trait NumberSeries2
{
    public function NumberSeriesA()
    {
        echo "NumberSeriesA From Trait-2\n";
    }
}



class NumberSeriesClass
{
    public function NumberSeriesA()
    {
        echo "NumberSeriesA From Parent Class\n";
    }
}

class NumberSeries extends NumberSeriesClass
{
    use NumberSeries1, NumberSeries2 {
        NumberSeries1::NumberSeriesA as NumberSeriesA1;
        NumberSeries2::NumberSeriesA as NumberSeriesA2;
        NumberSeriesClass::NumberSeriesA insteadof NumberSeries1, NumberSeries2;
    }
    // public function NumberSeriesA()
    // {
    //     echo "NumberSeriesA From Child Class\n";
    // }
}


$ns = new NumberSeries();
$ns->NumberSeriesA1();
$ns->NumberSeriesA2();
$ns->NumberSeriesA();