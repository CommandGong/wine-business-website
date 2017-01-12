<?php
    require_once("connect.php");
?>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    
/*
	$servername = "localhost";
	$usernameDB = "root";
	$password = "gonzo1982";
*/
	$username=$_POST["username"];
	$password1=$_POST["password1"];
	$password2=$_POST["password2"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
    
    
	if(!$phone){
		$phone="";
	}
/*
	$conn = mysql_connect($servername, $usernameDB, $password);
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}
    
*/ 

    if(defined("PHP_MAJOR_VERSION")&& PHP_MAJOR_VERSION>=7){
        
        mysqli_select_db($conn,"wineNigra");
        
        if(!$username){
            echo' <script>alert("Enter your User Name PLZ")</script>;'; 
//            echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 //              header("Location: " . $_SERVER["HTTP_REFERER"]);
            }

        }
        else if (!$password1){
//            die("Please enter your Password");
            echo' <script>alert("Please enter your Password")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        
        else if (!$password2){
//            die("Please enter your Second Password");
            echo' <script>alert("Please enter your Second Password")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        
        
        else if (!$email){
 //           die("Please enter your Email Address");
       
            echo' <script>alert("Please enter your Email Address")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        // constricting 
        
        if($password1 != $password2){
 //           echo "Two password does not match";
            echo' <script>alert("Two password does not match")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
            die();
        }
        $sql = "SELECT * FROM `user_info` WHERE email= '".$email."'";

        //email address check, password varify , encryption, decryption (optional) 
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) != 0){
            echo' <script>alert("this email address has been taken";")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
            die();
        }
        
        else {
            $sq2 = "INSERT INTO `user_info`(`Uname`,`phoneNumber`,`email`,`password`,`Webchat`) VALUES ('".$username."' , '".$phone."' , '".$email."' , '".$password1."','' )";
//            $result2 = mysqli_query($conn,$sq2);
           if ($conn->query($sq2) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sq2 . "<br>" . $conn->error;
            }
            header( "index.html" );
        }
        
    }
    else if(defined("PHP_MAJOR_VERSION")&& PHP_MAJOR_VERSION>=5){ 
        mysql_select_db("wineNigra",$conn);
        
        if(!$username){
            echo' <script>alert("Enter your User Name PLZ")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 //              header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
        else if (!$password1){
            echo' <script>alert("Please enter your Password")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        
        else if (!$password2){
            echo' <script>alert("Please enter your Second Password")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        
        
        else if (!$email){
            echo' <script>alert("Please enter your Email Address")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
        }
        // constricting 
        
        if($password1 != $password2){
            echo' <script>alert("Two password does not match")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
     
        }
        $sql = "SELECT * FROM `user_info` WHERE email= '".$email."'";

        //email address check, password varify , encryption, decryption (optional) 
        $result = mysql_query($sql,$conn);

        if(mysql_num_rows($result) != 0){
            echo' <script>alert("this email address has been taken";")</script>;'; 
            if (isset($_SERVER["HTTP_REFERER"])) {
                  header( "refresh:5;url=". $_SERVER["HTTP_REFERER"] );
 
            }
   
        }
        
        else {
            $sq2 = "INSERT INTO `user_info`(`Uname`,`phoneNumber`,`email`,`password`) VALUES ('".$username."' , '".$phone."' , '".$email."' , '".$password1."' )";
            $result2 = mysql_query($sq2,$conn);
            echo($result2);
            echo "注册成功";
            header( "refresh:5;url=index.html" );
        }
    }	
?>


</body>
</html>
