<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'web_login';

    $conn = new mysqli($host, $user, $password, $database);

    if($conn->connect_error){
        die('Database error:' . $conn->connect_error); // Corrected this line
    }
    else{
        // echo 'Database connected successfully';
    }

?>