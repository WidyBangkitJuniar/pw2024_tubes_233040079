<?php
    $con = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040079");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        exit();
    }
?>