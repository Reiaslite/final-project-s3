<?php
 define('BASEPATH', true);
include_once "../connection.php";
$db = new Database();

$nama = $_POST['nama'];
$kelas = $_POST['visi'];
$visi = $_POST['misi'];
$misi = $_POST['misi'];

$db->addKandidat($nama, $kelas, $visi, $misi);


?>