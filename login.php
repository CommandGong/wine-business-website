<?php

$servername = "localhost";
$usernameDB = "root";
$password = "gonzo1982";
$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db("mysql",$conn);
//$username=$_POST['Name'];
//$password=$_POST['Pass'];


$username="Dude";
$password=12345;
$sql = "SELECT * FROM `user_info` WHERE UName= '".$username."'";
$result = mysql_query($sql,$conn);

if(!$result){
 echo"query failed\n"; 
 echo $sql;
 die;
}

if (mysql_num_rows($result) == 0){
	echo "there is no such people";
	
}
else if (mysql_num_rows($result) > 1){
	echo "ERROR";
}
else{ 	
	echo "ok user exists";
}


$row=mysql_fetch_array($result);
echo "<br/>";
$mypass= $row['password'];


if($password=$mypass){

	echo "right";
}
else {
	echo "Wrong";
}

?>