<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $conn = new mysqli($servername,$username,$password,"udcntt");
    if ($conn->connect_errno) {
        echo "Không thể kết nối tới cơ sở dữ liệu: " . $conn -> connect_error;
        exit();
    }
?>
