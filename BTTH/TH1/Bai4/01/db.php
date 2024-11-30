<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'flowers';     

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    } else {
        $conn->query("SET NAMES 'utf8'");
        echo 'Đã kết nối database';
    }
?>