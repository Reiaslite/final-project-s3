<?php
    define('BASEPATH', 'public');
    require_once 'connection.php';
$db = new Database();

while($row = mysqli_fetch_assoc($db->data())){
    var_dump($row['nama']);
   }
?>