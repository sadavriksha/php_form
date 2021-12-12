<?php
    $conn = mysqli_connect("localhost", "root","","practics");

    if (!$conn) {
        echo "<script>alert('Connection failed.');</script>";
    }
?>