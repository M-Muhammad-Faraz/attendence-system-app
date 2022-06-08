<?php
session_start();
class user
{
    public $id;
    public $name;
    public $email;
    public $password;

    public $userAccount;
    public $totalAttendence;
    public function __construct($id, $name, $email, $password, $account)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->userAccount = $account;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
}
class Student extends user
{
    public $class;
    public $section;
    public $Grade;
    public $Attendence;
    public $totalAttendence;
    public function __construct($id, $name, $email, $password, $class, $section, $grade, $attendence, $tattendence)
    {
        parent::__construct($id, $name, $email, $password, "Student");
        $this->class = $class;
        $this->section = $section;
        $this->Grade = $grade;
        $this->Attendence = $attendence;
        $this->totalAttendence = $tattendence;
    }


    public function markAttendence($date, $status, $reason)
    {
        $this->totalAttendence = [$date => [$status => $reason], ...$this->totalAttendence];
    }
    public function markLeave($date, $status, $reason)
    {
        $this->totalAttendence = [$date => [$status => $reason], ...$this->totalAttendence];
    }

    public function getTotalAttendence()
    {
        return $this->totalAttendence;
    }
    public function getStudentData()
    {
        $data = [
            "Name" => $this->name,
            "Email" => $this->email,
            "Class" => $this->class,
            "Section" => $this->section,
            "Grade" => $this->Grade,
            "Attendence" => $this->Attendence
        ];
        return $data;
    }
}

class Teacher extends user
{
    public function __construct($id, $name, $email, $password)
    {
        parent::__construct($id, $name, $email, $password, "Teacher");
    }
    public function getListOfStudents($list)
    {
        $newList = [];
        foreach ($list as $item) {
            if ($item->userAccount == 'Student') {
                array_push($newList, $item);
            }
        }
        return $newList;
    }
}


$users = [
    new Student("0", "Faraz Shams", "zax@gmail.com", "12345678", "Matric", "B", "A", 26, [
        "6 March,2022" => ["P" => ""],
        "7 March,2022" => ["P" => ""],
        "8 March,2022" => ["P" => ""],
        "9 March,2022" => ["A" => ""],
        "10 March,2022" => ["P" => ""],
        "11 March,2022" => ["L" => "Illness"],
        "12 March,2022" => ["P" => ""],
        "13 March,2022" => ["P" => ""],
        "14 March,2022" => ["A" => ""],
        "15 March,2022" => ["P" => ""],
        "16 March,2022" => ["P" => ""],
        "17 March,2022" => ["L" => "Illness"],
        "18 March,2022" => ["P" => ""],
        "19 March,2022" => ["P" => ""],
        "20 March,2022" => ["P" => ""],
    ]),
    new Student("1", "GGWP GG", "zax2@gmail.com", "12345678", "Matric", "B", "A", 26, [
        "6 March,2022" => ["P" => ""],
        "7 March,2022" => ["P" => ""],
        "8 March,2022" => ["P" => ""],
        "9 March,2022" => ["A" => ""],
        "10 March,2022" => ["P" => ""],
        "11 March,2022" => ["L" => "Illness"],
        "12 March,2022" => ["P" => ""],
        "13 March,2022" => ["P" => ""],
        "14 March,2022" => ["A" => ""],
        "15 March,2022" => ["P" => ""],
        "16 March,2022" => ["P" => ""],
        "17 March,2022" => ["L" => "Illness"],
        "18 March,2022" => ["P" => ""],
        "19 March,2022" => ["P" => ""],
        "20 March,2022" => ["P" => ""],
    ]),
    new Teacher("2", "Sir Faraz", "sirzax@gmail.com", "12345678")
    // ["userID" => "1", "userEmail" => "zaxsir@gmail.com", "userAccount" => "Teacher", "userPassword" => "12345678"]
];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="stylesheet" href="style/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>

<body>