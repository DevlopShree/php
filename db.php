<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'web_login';

    $conn = new mysqli($host, $user, $password, $database);

    if($conn->connect_error){
        die('Database error:' . $conn->connect->error);
    }
    else{
        // echo 'Database connected successfully';
    }

?>