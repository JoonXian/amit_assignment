<?php 

$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$database1 = "users_db"; // Database name
$database = "shopping"; // Database name

$conn = new mysqli($host, $user, $password, $database1);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>