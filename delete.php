<?php

$servername = "localhost";
$usernameDB = "root";
$password = "gonzo1982";
$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db("wineNigra",$conn);
$Oid=$_POST['Oid'];



$sql = "DELETE FROM `my_order` WHERE Oid= '".$Oid."'";
$result = mysql_query($sql,$conn);

if(!$result){
 echo"failed"; 
 echo $sql;
 die;
}

else{ 	
	echo "SUCCESS";
}




?>