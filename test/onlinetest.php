<?php
$servername = "localhost";
$usernameDB = "root";
$password = "gonzo1982";

$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
?>