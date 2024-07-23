<?php

class HextoRGB
{
    private $color;
    private $red;
    private $green;
    private $blue;

    public function __construct($hexcode = '')
    {
        $this->color = ltrim($hexcode, "#");
    }

    public function getcolor()
    {
        return $this->color;
    }

    public function getRgbColor()
    {
        $this->parseColor();
        return join(",", array($this->red, $this->green, $this->blue));
    }

    public function setcolor($hexcode)
    {
        $this->color = ltrim($hexcode, "#");
    }

    private function parseColor()
    {
        if ($this->color) {
            list($this->red, $this->green, $this->blue) = sscanf($this->color, '%02x%02x%02x');
        } else {
            list($this->red, $this->green, $this->blue) = array(0, 0, 0);
        }
    }
}


$mycolor = new HextoRGB();

echo $mycolor->getRgbColor() . "\n";
$mycolor->setcolor("222222");
echo $mycolor->getRgbColor() . "\n";
