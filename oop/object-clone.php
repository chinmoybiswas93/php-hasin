<?php
class InnerObject {
    public $value;

    public function __construct($value) {
        $this->value = $value;
    }
}

class OuterObject {
    public $name;
    public $inner;

    public function __construct($name, $inner) {
        $this->name = $name;
        $this->inner = $inner;
    }

    public function __clone() {
        // Explicitly clone the nested object
        $this->inner = clone $this->inner;
    }
}

// Original objects
$inner = new InnerObject('Original Value');
// $outer = new OuterObject('Outer Object', $inner);

// // Clone the outer object
// $clonedOuter = clone $outer;

// // Modify the cloned inner object
// $clonedOuter->inner->value = 'Modified Value';

// // Output
// // echo $outer->inner->value; // Outputs: Original Value
// // echo $clonedOuter->inner->value; // Outputs: Modified Value


// print_r($outer);
// print_r($clonedOuter);

$clonedObject = unserialize(serialize($inner));

print_r($inner);
print_r($clonedObject);

$clonedObject->value = 'Modified Value';

print_r($inner);
print_r($clonedObject);

// $clonedObject->inner->value = 'Modified Value';

// print_r($inner);
// print_r($clonedObject);