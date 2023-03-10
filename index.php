<?php

echo "Learning PHP\n";

echo "<br>***************************************************************<br>";
echo "Variables<br><br>";
// Variables
$name = "d_captain";
$age = 47;
$is_male = true;
if(isset($name)){
    // echo "Name found: ";
    // echo $name,"\n";
    var_dump($name);  //shows type
}
else{
    echo "Name not found";
}


echo "<br>***************************************************************<br>";
// Arrays
echo "Arrays<br><br>";
$marks = [20, 30, 54, 57];
$names = ["Dan", "Kawasaki"];

echo '<pre>';
var_dump($marks);
echo '</pre>';

array_push($marks, 70); //add element to last
array_unshift($marks, 83); //add element to first
array_pop($marks); //remove last element
array_shift($marks); //remove first element
echo '<pre>';
var_dump($marks);
echo '</pre>';


//associative array
$person = [
    'name' => 'Ndirangu',
    'age' => 80
];


echo "<br>***************************************************************<br>";
// loops
echo "Loops<br><br>";
for($x=0; $x<10; $x++){
    echo "{$x} ";
}


echo "<br>***************************************************************<br>";
//Functions
echo "Functions<br><br>";
function loopnums(){
    for($x=0; $x<10; $x++){
        echo "{$x} ";
    }
}

loopnums();


echo "<br>***************************************************************<br>";
//Classes
echo "Classes<br><br>";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Person{
    public string $name;
    private int $age; //access only by class
    protected string $message; //by class and those that inherit it

    public function __construct($name){  //called first
        //echo "GDSC Session is lit" . "<br>";
        $this->name = $name;
        echo "{$this->name} - Construct "."<br>";
    }

    public function getter(){ 
        return $this->name."<br>";
    }

    public function __destruct(){ 
        echo "{$this->name} - Destruct "."<br>";
    }
};
$person = new Person("Mandalore");
echo $person->getter();


echo "<br>***************************************************************<br>";
//Inheritance
echo "Inheritance<br><br>";

class Student extends Person{
    public string $adm;

    public function __construct($name, $adm){
        $this->adm = $adm;
        parent::__construct($name);
    }
};
$student = new Student("Sabine", "Spector 6");
echo $student->getter();


echo "<br>***************************************************************<br>";
//Db connections
echo "Db connections<br><br>";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class db_connect{
    private $db_host = '127.0.0.1';
    private $db_name = 'gdsc';
    private $db_user = 'root';
    private $db_pass = '';

    protected $connection = null;

    public function connect(){
        if($this->connection == null){
            try{
                $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;", $this->db_user, $this->db_pass);
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
    }
};










?>