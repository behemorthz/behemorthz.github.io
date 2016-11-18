<?php 
$servername = "127.0.0.1";
$username = "3mthesis";
$password = "0983492721";
$dbname = "3mthesis";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

mysqli_set_charset($conn,"utf8");
 
?>