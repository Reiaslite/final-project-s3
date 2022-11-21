<?php 
defined("BASEPATH") or exit("No direct script access allowed");

include_once 'const.php';

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
        $query = "INSERT INTO siswa (nama, nis, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $nama, $nis, $email, $password);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    function login($name, $password){
    $query = "SELECT * FROM siswa WHERE nama = :nama";

      $stmt = $this->db->prepare($query);

      $stmt->bind_Param(":nama", $name);
      
      $stmt->execute();
      
      $data = $stmt->fetch(); 
     
      if ($stmt->num_rows() >0) {
        echo "selamat datang";
        
      }else {
        echo "username atau password salah";
      }
       
    }

    function register($name,$nis, $email, $password){
        try {

            $hashPass= password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO siswa (nama, nis, email, password) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_Param("ssss", $name, $nis,$email, $password);
            $stmt->execute();

            return true;


        } catch (PDOException $e) {
            $this->error;

            if(str_contains($e, $e->getMessage())){
                $this->error = "nama sudah digunakan";
                return false;
            }else{
                echo $e->getMessage();
            }
        }
    }
   

}