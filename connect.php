<?php
$path=dirname(__FILE__);
 
//while(!file_exists($path.'/system-variables.php'))$path=dirname($path);
//require_once($path.'/system-variables.php');

$servername = "localhost";
$usernameDB = "root";
$passwords = "gonzo1982";

if(defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION >= 7){
    $conn = mysqli_connect($servername, $usernameDB, $passwords);
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    } 
}
else if(defined ('PHP_MAJOR_VERSION')&& PHP_MAJOR_VERSION>= 5){
    $conn = mysql_connect($servername, $usernameDB, $passwords);
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    } 
}   
else {
    die("the php version is below 5 and above 7, update your code!");
}


 
 
?>