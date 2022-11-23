<?php 
defined("BASEPATH") or exit("No direct script access allowed");
include_once 'const.php';

session_start();
class Database {    
    public $db;
    private $error;
    //  $sambung = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno):
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
            exit();
        endif;
    }



    function insert($nama, $nis, $email, $password) {
        try {
            $query = "INSERT INTO siswa (nama, nis, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ssss", $nama, $nis, $email, $password);
            $stmt->execute();
            
            // return $stmt->affected_rows;
           } 
           catch (mysqli_sql_exception $e) {
             if($e->getCode() == 1062 ){
                echo "Email sudah digunakan";
                return false;
             }
            
        }
        return true;
       
    }

    function login($email, $password){
    $query = "SELECT * FROM siswa WHERE email = '$email' and password = '$password'";

      $stmt = mysqli_query($this->db, $query);
      
      if ($stmt->num_rows >0) {
     $row = mysqli_fetch_assoc($stmt);
     $_SESSION['nama']=$row["nama"];
    
        return true;
        
      }else {
           
        return false;
      }
       
    }
    function logout(){
        session_destroy();
    }
    function data(){
      try{
        $query = "SELECT * kandidat" ;

        $stmt = mysqli_query($this->db,$query);
        if($stmt->num_rows > 0){
          $row = mysqli_fetch_assoc($stmt);
  
        }
      }catch(Exception $e){
        
      }
     
    } 
   

}