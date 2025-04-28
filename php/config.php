<?php 

$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$database = "shopping"; // Database name
$database = "db5"; // Database name 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>