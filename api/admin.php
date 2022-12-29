<?php
 define('BASEPATH', true);
include_once "../connection.php";
$db = new Database();

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$foto = $_FILES['gambar'];



    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    if ($error === 4) {
   
     return false;
    }
    //validasi extensi
    $ekstensiGambarValidasi = ['jpg','jpeg','png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
   
    move_uploaded_file($tmpName,"../assets/img/" . $namaFile);
  




header("Content-type: application/json");
$result =$db->addKandidat($nama, $kelas, $visi, $misi, $namaFile);

if ($result) {
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