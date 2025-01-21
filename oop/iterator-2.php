<?php

class NumberIterator implements Iterator {
    private $numbers = [];
    private $position = 0;

    public function __construct(array $numbers) {
        $this->numbers = $numbers;
        $this->position = 0;
    }

    public function current(): mixed { // Add proper return type
        return $this->numbers[$this->position];
    }

    public function key(): mixed { // Add proper return type
        return $this->position;
    }

    public function next(): void { // Add proper return type
        $this->position++;
    }

    public function rewind(): void { // Add proper return type
        $this->position = 0;
    }

    public function valid(): bool { // Add proper return type
        return isset($this->numbers[$this->position]);
    }
}

$iterator = new NumberIterator([1, 2, 3, 4, 5]);

foreach ($iterator as $key => $value) {
    echo "Key: $key, Value: $value\n";
}
