<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3mt";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

mysqli_set_charset($conn,"utf8");
 
?>