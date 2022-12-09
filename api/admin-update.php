<?php
define('BASEPATH', true);
include_once "../connection.php";
$db = new Database();

$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];

$namaFile = $_FILES['file']['name'];
$tmpName = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];

if ($error === 4) {

 return false;
}
//validasi extensi
$ekstensiGambarValidasi = ['jpg','jpeg','png'];
$ekstensiGambar = explode(".", $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));

move_uploaded_file($tmpName,"../assets/img/" . $namaFile);

$result = $db->updateKandidat($id, $nama, $kelas, $visi, $misi, $namaFile);
  
header("Content-type: application/json");

if($result){
    echo json_encode([
        "status"=>"success",
        "data" => $result
    ]);

    die;
}else{
    echo json_encode([
        "status" => "error",
        "message"=> "invalid id"
    ]);
    die;
}


?>