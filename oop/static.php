<?php
// class MathCalculator {
//     private $number;
//     static $name;
//     static function fibonacci($n){
//         echo "Fibonacci Series up to {$n}\n";
//        self::factorial($n);
//     }

//     public function factorial($n) {
//         echo "Factorial of {$n}\n";
//     }
// }

// $mathc = new MathCalculator();

// // MathCalculator::fibonacci(10);
// // $mathc->fibonacci(10);
// // MathCalculator::factorial(10);


// // class Student{
// //     public $age;
// //     static $generation = 2006;

// //    public function readPublic(){
// //        return $this->age;  
// //    }

// //    public static function readStatic(){
// //     //    return $this->age;         // case 1
// //     //    return $student1->age;    // case 2 
// //        return self::$generation;    // case 3 

// //    }
// // }

// // $student1 = new Student();
// // var_dump(Student::readStatic());

// class Example {

//     // property declaration
//     public $value = "The text in the property\n";

//     // method declaration
//     public function displayValue() {
//         echo $this->value;
//     }

//     static function displayText() {
//         echo "The text from the static function\n";
//     }
// }


// $instance = new Example();
// // $instance->displayValue();

// $instance->displayText();

// // Example::displayValue();         // Direct call to a non static function not allowed

// Example::displayText();



// PHP code for static method 
// class College
// {
//     static $cname = "MNNIT Allahabad";

//     public function __construct($name)
//     {
//         $this->cname = $name;
//     }


//     // Static function
//     static function getCollegeName()
//     {
//         return self::$cname;
//     }
// }


// $nc = new College('City College');
// echo $nc->getCollegeName();
// // Calling function without its object
// echo (College::getCollegeName());


// Program to compare execution time 
// of static and instance methods
// set_time_limit(0);

// // Checking php version
// echo 'Current PHP version: ' . phpversion();

// // Creating class for static
// Class St {

// 	public static $count = 0;

// 	// function that will print nothing
// 	public static function getResult()
// 	{
// 		self::$count = self::$count + 1;
// 	}
// }

// // For calculating time
// $time_start_static = microtime(true);

// // This loop will run 100000 times
// for($i = 0; $i < 100000; $i++) {
// 	St::getResult();
// }

// // Execution time for static method ends here
// $time_end_static = microtime(true);

// // Execution time is end -start time
// $time_static = $time_end_static - $time_start_static;

// // Printing the result
// echo "\nTotal execution time is for static method is: '$time_static'";

// // Demo class for instance method
// class Ins {
// 	private $count = 0;

// 	// Function that will not print anything
// 	public function getResult() {
// 		$this -> count = $this -> count + 2;
// 	}
// }

// // Creating an instance object
// $ob = new Ins;

// // Starting time is initialize
// $time_start_instance = microtime(true);

// // For time loop is run
// for($i = 0; $i < 100000; $i++)
// {
// 	$ob -> getResult();
// }

// // Execution end for instance method
// $time_end_instance = microtime(true);

// // Total time is end-start time
// $time_instance = $time_end_instance - $time_start_instance;

// // Result is printed
// echo "\nTotal execution time for instance method is: '$time_instance'";


class Person
{
    private $name;
    private $age;

    public function __construct($name = '', $age = '')
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $value)
    {
        $this->$prop = $value;
    }
}


$R = new Person('Rahim', '13');
// $R->name = 'CHinmoy';
// $R->name = '16';
var_dump($R->name);
// var_dump($R->age); 