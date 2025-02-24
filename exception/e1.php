<?php
class Student
{
    public $name, $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        if ($age < 6) {
            throw new Exception("Invalid Age: Too Young!", 1001);
        }elseif($age > 28) {
            throw new Exception("Invalid Age: Too Old!", 1002);
        }
        $this->age = $age;
    }
}


try {
    $s1 = new Student('Rahim', 35);
    echo "My Name is {$s1->name}, I am {$s1->age} years old.";
} catch (Exception $e) {
    echo "{$e->getCode()} : {$e->getMessage()}";
}finally {
    echo "\nFinally\n";
}