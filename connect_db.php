<?php
echo "hej";
$conn = mysqli_connect("localhost", "root", "root", "DentalgrejDB");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connent_error);
} else {
    echo "Connented succesfully";
}
?>