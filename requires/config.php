<?php
    ini_set("session.hash_function","sha512");
    session_start();

    ini_set("max_execution_time",500);

    $db_host = "";
    $db_user = "";
    $db_pass = "";
    $db_data = "";

    $con = new mysqli($db_host,$db_user,$db_pass,$db_data);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>