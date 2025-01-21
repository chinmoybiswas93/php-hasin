<?php

trait NummberSeriesOne
{
    function NumberSeriesA()
    {
        echo "Printing Number Series A - From NummberSeriesOne Trait\n";
    }
    function NumberSeriesB()
    {
        echo "Printing Number Series B - From NummberSeriesOne Trait\n";
    }
}


class NumberSeries
{
    use NummberSeriesOne;
    
    function NumberSeriesA()
    {
        echo "Printing Number Series A - From NummberSeries Class\n";
    }
}

class ExNumberSeries extends NumberSeries
{
    use NummberSeriesOne;

    // function NumberSeriesA()
    // {
    //     echo "Printing Number Series A - From ExNummberSeries class\n";
    // }
}


$ns = new ExNumberSeries();
$ns->NumberSeriesA();

$ns1 = new NumberSeries();
$ns1->NumberSeriesA();