<?php
/*
$servername = "localhost";
$usernameDB = "root";
$pass = "gonzo1982";

*/
require_once("connect.php");
 
$username=$_POST['Name'];
$password=$_POST['Pass'];
 
if(defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION >= 7){
/*
    $conn = mysqli_connect($servername, $usernameDB, $pass);

    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    } 
*/
    mysqli_select_db($conn,"winenigra");
 


    $sql = "SELECT * FROM `user_info` WHERE email= '".$username."'";
    $result = mysqli_query($conn,$sql);

    if(!$result){
     echo"failed"; 
     echo $sql;
     die;
    }

    if (mysqli_num_rows($result) == 0){
        echo "failed";
        echo $sql;
        die;
    }
    else if (mysqli_num_rows($result) > 1){
        echo "failed";
        echo $sql;
        die;
    }
    else{ 	
        
    }


    $row=mysqli_fetch_array($result);
    $mypass= $row['password'];


    if($password==$mypass){

        echo "SUCCESS";
    }
    else {
        echo "failed";
    }
}
else{
//    $conn = mysql_connect($servername, $usernameDB, $password);
/*    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    } 
*/
    mysql_select_db("wineNigra",$conn);



    $sql = "SELECT * FROM `user_info` WHERE email= '".$username."'";
    $result = mysql_query($sql,$conn);

    if(!$result){
     echo"failed"; 
     echo $sql;
     die;
    }

    if (mysql_num_rows($result) == 0){
        echo "failed";
        die;
    }
    else if (mysql_num_rows($result) > 1){
        echo "failed";
        die;
    }
    else{ 	
        
    }


    $row=mysql_fetch_array($result);
    $mypass= $row['password'];


    if($password==$mypass){

        echo "SUCCESS";
    }
    else {
        echo "failed";
    }
}
?>