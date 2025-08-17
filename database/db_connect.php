<?php
$host = "localhost";     // your DB host
$user = "root";          // your DB username
$pass = "";              // your DB password
$dbname = "testdb";      // your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
