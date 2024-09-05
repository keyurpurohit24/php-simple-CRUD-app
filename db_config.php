<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'crud_app';

    $conn = new mysqli($server,$user,$password,$database);
    if ($conn->connect_error) {
        echo "Unable to connect with database ".$conn->connect_error;
    }
?>