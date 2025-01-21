<?php
interface BaseStudent
{
    public function introduce();
}
class Student
{
    protected $name;
    protected $id;
    function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function introduce()
    {
        echo "My name is {$this->name} and my id is {$this->id}\n ";
    }
}

class ExamStudent extends Student implements BaseStudent
{
    private $score;
    public function __construct($name, $id, $score)
    {
        parent::__construct($name, $id);
        $this->score = $score;
    }
    public function introduce()
    {
        echo "My name is {$this->name} and my id is {$this->id} and my score is {$this->score}\n";
    }
}


class StudentManager
{
    public function __construct()
    {

    }
    public function introduce($student)
    {
        $student->introduce();
        return $this;
    }

    public function result()
    {
        echo 'Got Chance';
    }
}


$s1 = new Student("John", 123);
$s2 = new Student("Jane", 456);
$d1 = new DateTime();
$sm = new StudentManager();
// $sm->introduce($s1);

$s3 = new ExamStudent("Pooja", 12966, 230);
$sm->introduce($s3)->result();



// $sm->introduce($d1);

// var_dump($s1 instanceof Student);



