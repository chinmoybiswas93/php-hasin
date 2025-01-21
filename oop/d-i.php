<?php

interface BaseStudent
{
    public function introduce();
    public function display_name();
    public function read();
}

class Student implements BaseStudent
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function introduce()
    {
        echo "Hello, I am $this->name & I'm a student\n";
    }
    public function display_name()
    {
        echo "Hello, I am $this->name & I'm a student\n";
    }
    public function read()
    {
        echo "$this->name is reading\n";
    }
}

class Teacher extends Student
{
    public function display_name()
    {
        echo "Hello, I am $this->name & I'm a teacher\n";
    }
}

class Doctor
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function display_name()
    {
        echo "Hello, I am $this->name & I'm a doctor\n";
    }
}

class StudentManager
{
    public $student;
    public function __construct($student)
    {
        $this->student = $student;
    }
    public function introduce()
    {
        $this->student->display_name();
    }

    public function read()
    {
        $this->student->read();
    }
}

$chinmoy1 = new Student("Chinmoy");
$s1 = new StudentManager($chinmoy1);
// $s1->introduce();

$kairul = new Teacher("Kairul");
$s2 = new StudentManager($kairul);
// $s2->introduce();
// $s2->read();

$ahmed = new Doctor("Ahmed");
$s3 = new StudentManager($ahmed);
$s3->read();

// trigger_error("Fatal error", E_USER_ERROR);
