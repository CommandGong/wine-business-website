<?php


$servername = "localhost";
$usernameDB = "root";
$password = "gonzo1982";
$conn = mysql_connect($servername, $usernameDB, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db("wineNigra",$conn);
$cookie_name = "username";
$useremail=$_COOKIE[$cookie_name];
/*
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
*/

$app_date=$_POST['date'];
$app_time=$_POST['time'];
$num_people=$_POST['num_people'];
$contact=$_POST['contact'];
$appended=$_POST['appended'];

$app_state=$_POST['appointment_state'];
$winetaste_state=$_POST['winetaste_state'];
$visitegarden_state=$_POST['visitegarden_state'];
$lunch_state=$_POST['lunch_state'];

/*
echo "app_date".$app_date.
		"\n app_time:".$app_time.
		"\n num_people:".$num_people.
		"\n contact:".$contact.
		"\n appended:".$appended.
		"\n app_state:".$app_state.
		"\n winetaste_state:".$winetaste_state.
		"\n visitegarden_state:".$visitegarden_state.
		"\n lunch_state:".$lunch_state;
*/
//	
	$sql="SELECT `ID` FROM `user_info` WHERE email='".$useremail."' ";
	
	$result = mysql_query($sql,$conn);
				
				if(!$result){
					echo"query failed \n"; 
					echo $sql;
					echo $result;
					die();
				}
	$row=mysql_fetch_array($result);
	$u_id=$row['ID'];
	
	$sql="INSERT INTO appointment (u_id,num_vistor,appointment_state,winetaste_state,visitegarden_state,lunch_state,appended,start_date,contact)
	VALUES ('".$u_id."','".$num_people."','".$app_state."','".$winetaste_state."','".$visitegarden_state."','".$lunch_state."','".$appended."','".$app_date."','".$contact."')";
	
	
	$result = mysql_query($sql,$conn);
				
				if(!$result){
					echo"query failed \n"; 
					echo $sql;
					echo $result;
					die();
				}

?>