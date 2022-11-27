<?php
    define('BASEPATH', true);
    require_once '../connection.php';
    $db = new Database();
    if (isset($_POST)):
        header("Content-Type: application/json");

        echo json_encode([
            "id" => $_POST['id'],
            "user_id" => $_POST['user_id'],
            "count" => $_POST['count']
        ]);

        $db->vote($id, $user_id, $count);
    endif;
