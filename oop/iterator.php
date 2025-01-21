<?php

// class DistrictCollection implements IteratorAggregate, Countable
// {
//     private $districts;

//     public function __construct()
//     {
//         $this->districts = [];
//     }

//     public function addDistrict($district)
//     {
//         array_push($this->districts, $district);
//     }

//     // Specify that the return type is Traversable
//     public function getIterator(): Traversable
//     {
//         return new ArrayIterator($this->districts);
//     }
//     public function count(): int
//     {
//         return count($this->districts);
//     }
// }

// $districts = new DistrictCollection();
// $districts->addDistrict('Sylhet');
// $districts->addDistrict('Dhaka');
// $districts->addDistrict('Chittagong');
// $districts->addDistrict('Kumilla');

// // foreach ($districts as $district) {
// //     echo $district . "\n";
// // }

// echo $districts->count() . "\n";
// echo count($districts);


class NumberIterator implements Iterator {
    private $numbers = [];
    private $position = 0;

    public function __construct(array $numbers) {
        $this->numbers = $numbers;
        $this->position = 0;
    }

    public function current() {
        return $this->numbers[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        $this->position++;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset($this->numbers[$this->position]);
    }
}

$iterator = new NumberIterator([1, 2, 3, 4, 5]);

foreach ($iterator as $key => $value) {
    echo "Key: $key, Value: $value\n";
}
