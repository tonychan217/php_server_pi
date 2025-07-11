<?php 

$servername = "localhost";
$username = "tony";
$password = "4801";
$dbname = "rasp_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    ?>
