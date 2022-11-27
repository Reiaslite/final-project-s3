<?php
header("Content-Type: application/json");
 define ("BASEPATH", true);
 require_once "../connection.php";

 $db = new Database();
 if(!isset($_GET['id'])){
    echo json_encode([
        "status" => "error",
        "message"=> "invalid id"
    ]);
    return ;
 }
 $kandidat = $db->getKandidat($_GET['id']);
 echo json_encode([
    "status"=>"success",
    "data" => $kandidat
 ]);

return;
?>