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
    
    
    function addKandidat($nama, $kelas, $visi, $misi){
      try {
        $query = "INSERT INTO kandidat (nama, kelas, visi, misi) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $nama, $kelas, $visi, $misi);
        $stmt->execute();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
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

        if ($row['is_voted'] == 1) {
          return false;
        }
        
        if($row['role']=="admin"){
          $_SESSION['role']='admin';
        
        }else{
          $_SESSION['role']='user';
        }

        
        

        $_SESSION['nama']=$row["nama"];
        $_SESSION['id'] = $row['id'];
        setcookie(
          "id",
          $_SESSION['id']
        );
        return true;

        
      }else {
        
        return false;
      }
       
    }
    function logout(){
        session_unset();
        session_destroy();
        header("Location:signin.php");
    }

    function updateKandidat($id, $nama, $kelas, $visi, $misi){
      $query = "UPDATE kandidat SET nama ='$nama', kelas='$kelas', misi='$misi', visi='$visi' WHERE id='$id'";
      $stmt = mysqli_query($this->db, $query);

      if (mysqli_num_rows($stmt)>0) {
        return true;
        
      }
      return false;
    }


    function data(){
      try{
        $query = "SELECT * FROM kandidat" ;

        $stmt = mysqli_query($this->db,$query);
        
        if(mysqli_num_rows($stmt) > 0){

         return $stmt;
        }else{
          return 0;
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
     
    } 
   
    function vote($id, $user_id) {
      $query = "SELECT * FROM siswa WHERE id='$user_id'";
      $user = mysqli_query($this->db, $query)->fetch_assoc();
      if ($user['is_voted'] === 1) return false;

      $query = "UPDATE siswa SET is_voted=1 WHERE id='$user_id'";
      mysqli_query($this->db, $query);
      
      $query = "SELECT * FROM kandidat WHERE id='$id'";

      $kandidat = mysqli_query($this->db, $query)->fetch_assoc();
      $count = $kandidat['count'] + 1;

      $query = "UPDATE kandidat SET count=$count WHERE id='$id'";
      $result = mysqli_query($this->db, $query);

      return true;
    }

    function getKandidat($id){
      $query = "SELECT * FROM kandidat WHERE id = '$id'";
      $result = mysqli_query($this->db, $query);

      return $result->fetch_assoc();  
    
    }
    
    function deleteKandidat($id) {
      if (!isset($id)) return false;
      $query = "DELETE FROM kandidat WHERE id=$id";
      $result = mysqli_query($this->db, $query);

      return true;
    }

}