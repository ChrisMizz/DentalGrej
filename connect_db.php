<?php
//bruger navn og kode skal selvfølgelig ændres af sikkerhedsmæssige årsager
//Men så længe at siden er under udvikling, så beholder vi nedenstående info
$conn = mysqli_connect("localhost", "root", "root", "mydb"); 

if ($conn->connect_error) {
    die("connection failed: " . $conn->connent_error);
} else {
    //echo "Connented succesfully";
}
?>