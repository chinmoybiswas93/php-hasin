<?php

class StringUtility
{
    private $string;
    private $search;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function search($string)
    {
        $this->search = $string;
        return $this;
    }

    public function replace($string)
    {
        if (!isset($this->search)) {
            trigger_error('No Search String Found. Please Use search() method first.', E_USER_NOTICE);
        } else {
            $this->string = str_replace($this->search, $string, $this->string);
            $this->search = "";
            return $this;
        }
    }

    public function uppercase()
    {
        $this->string = strtoupper($this->string);
        return $this;
    }

    public function lowercase()
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    function print()
    {
        echo $this->string;
    }
}

$s = new StringUtility('Hello World');

$s->search('Hello')
->replace('Laravel')
->uppercase()
->lowercase()
->print();

