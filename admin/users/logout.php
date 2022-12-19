<?php 
    define('BASEPATH','public');
    include_once "../../connection.php";
    session_unset();
    session_destroy();
    header("Location: ../../signin.php");
    
?>