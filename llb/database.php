<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
 
class database{

 	public $host=HOST;
 	public $user=USER;
 	public $password=PASSWORD;
 	public $database=DATABASE;


    public $link;
    public $error;


 	public function __construct(){
 		$this->dbconnection();
 	}


    public function dbconnection(){
        $this->link = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        if (!$this->link) {
            $this->error = 'Database connection failed';
            return false;
        }

    }


    //select query
    public function select($query){
        $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
        if (mysqli_num_rows($result)>0) {
            return $result;   
        }else{
            return false;
        }
    }

    //Insert query
    public function insert($query){
        $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
        if (isset($result)) {
            return $result;   // code...
        }else{
            return false;
        }
    }


     //Update query
    public function update($query){
        $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
        if (isset($result)) {
            return $result;   // code...
        }else{
            return false;
        }
    }

     //Delate query
    public function delate($query){
        $result=mysqli_query($this->link,$query) or die($this->link->error.__LINE__);
        if (isset($result)) {
            return $result;   // code...
        }else{
            return false;
        }
    }






}




?>