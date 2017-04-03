<?php
unset($_SESSION["loggedIn"]);       //Fjerner session "loggedin", så de ikke længere har status som logget ind
header('Location: index.html');     //sender dem hen til forsiden
?>