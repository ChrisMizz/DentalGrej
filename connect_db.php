<?php
$conn = mysqli_connect("localhost", "root", "root", "mydb");

if ($conn->connect_error) {
    die("connection failed: " . $conn->connent_error);
} else {
    echo "Connented succesfully";
}
?>