<?php

$servername = "localhost";
$usernameDB = "root";
$password = "1982gonzo";

$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db("oakdaleproject",$conn);
$username=$_POST['ID'];
//SELECT `ID`, `Name` FROM `user_info` WHERE ID IN (SELECT `Uid` FROM my_order WHERE pid=1)


$sql1 = "SELECT `UName`FROM `user_info` WHERE ID = '".$username."'";
$result1 = mysql_query($sql1,$conn);
if(!$result1){
 echo"name failed\n"; 
 
 die;
}
else if (mysql_num_rows($result1) == 0){
 echo "you do not even regesiter!";
 die;
}
else {
$rows=mysql_fetch_array($result1);
$userName = $rows['UName'];

}


//echo $username;
//$sql = "SELECT emailAddress, password FROM users WHERE emailAddress='" . $username ."' AND password='" . $password. "'";
//$sql = "SELECT `UName`,`PName`, `price` FROM `product`,`user_info` WHERE ID=1 AND pid IN (SElECT pid FROM my_order WHERE Uid=1)";
$sql = "SELECT `UName`,`PName`, `price` FROM `product`,`user_info` WHERE ID='".$username."' AND pid IN (SElECT pid FROM my_order WHERE Uid='".$username."')";
$result = mysql_query($sql,$conn);

if(!$result){
 echo"query failed\n"; 
 echo $sql;
 die;
}
else {

echo "hollow ";
echo $userName;
echo "</br>";
if (mysql_num_rows($result) == 0){
	echo "you Currently did not order any thing</br>";
	
}
else{ 	
	echo "! Here is your order</br>";
}
$total=0;
$itemn=1;
while($row=mysql_fetch_array($result)){
	
	
	 	
	
//	$product = $row['UName'];
	echo $itemn;
	echo ": ";
	echo $row['PName'];
//	echo $row['UName'];
	echo "  ";
	$p = $row['price'];
	$total=$total+$p;
	echo $p;
	
	echo "</br>";
	$itemn++;
}
}
echo "The total price you need to pay is: ";
echo $total;

//echo  $userName;

?>