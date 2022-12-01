<?php
define('BASEPATH', true);
include_once "../connection.php";
$db = new Database();

$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];

if($db->updateKandidat($id, $nama, $kelas, $visi, $misi)){
    echo "Data Berhasil di Update";
    echo "<script>history.back();</script>";
    exit;
}
echo"data gagal di update"

?>