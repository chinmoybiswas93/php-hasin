<?php

/*
    PHP Trait Example
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
    }
}


trait NumberSeries2
{
    public function NumberSeriesC()
    {
        echo "NumberSeriesC From Trait\n";
    }
    public function NumberSeriesD()
    {
        echo "NumberSeriesD From Trait\n";
    }
}

trait NumberSeries3
{
    use NumberSeries1;
    public function NumberSeriesB()
    {
        echo "NumberSeriesC From Trait\n";
    }
    public function NumberSeriesD()
    {
        echo "NumberSeriesD From Trait\n";
    }
}



class NumberSeries
{
    use NumberSeries3;

    public function NumberSeriesB()
    {
        echo "NumberSeriesC From Class\n";
    }
    public function NumberSeriesD()
    {
        echo "NumberSeriesD From Class\n";
    }
}

$ns = new NumberSeries();
$ns->NumberSeriesA();
$ns->NumberSeriesB();
// $ns->NumberSeriesC();
$ns->NumberSeriesD();