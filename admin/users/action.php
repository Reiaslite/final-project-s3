<?php
define("BASEPATH", true);

require_once '../../connection.php';
$db = new Database();


$action = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case "delete":
        $db->deleteKandidat($id);
        echo "<script>history.back();</script>";
        break;
}