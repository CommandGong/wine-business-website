<?php

$servername = "localhost";
$usernameDB = "root";
$password = "gonzo1982";
$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db("wineNigra",$conn);
$Pid=$_POST['Pid'];
$name=$_POST['username'];


$sql = "SELECT * FROM user_info WHERE email='".$name."'";;

$result = mysql_query($sql,$conn);

$row=mysql_fetch_array($result); 
$Uid= $row['ID'];

$sql = "INSERT INTO my_order (Uid,Pid) VALUES ('".$Uid."','".$Pid."')";;
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