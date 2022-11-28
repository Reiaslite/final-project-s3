<?php
    define('BASEPATH', true);
    require_once '../connection.php';
    $db = new Database();

    if (isset($_POST)):
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $count = $_POST['count'];

        $result = $db->vote($id, $user_id, $count);
        
        if (!$result) {
            echo json_encode([
                "status" => "false",
                "message" => "Kamu telah memilih"
            ]);

            exit;
        } 

        echo json_encode([
            "status" => "success",
            "message" => "Telah berhasil memilih kandidat!"
        ]);

        session_unset();
        session_destroy();
        exit;
    endif;
