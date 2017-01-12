
<html>
	<head>
		<title>your cart</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
		
		<script>
		
	
			function deleted(theoid){
				connect();
				
				$.ajax({
					
					type: "POST",
					url: "delete.php",

					data: {
							'Oid': theoid
							
						   },
					success: function(msg){
						
						 if(msg=="SUCCESS"){
							alert("your prodcut has been successfuly deleted ");
							location.reload();
						 }
						 
					
						
					}
				});
			}
			
			function connect(){
				if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}

			}
		</script>
		
	</head>
	<body>
		<style>
			.split-custom-wrapper {
				/* position wrapper on the right of the listitem */
				position: absolute;
				right: 0;
				top: 0;
				height: 100%;
			}

			.split-custom-button {
				position: relative;
				float: right;   /* allow multiple links stacked on the right */
				height: 100%;
				margin:0;
				min-width:3em;
				/* remove boxshadow and border */
				border:none;
				moz-border-radius: 0;
				webkit-border-radius: 0;
				border-radius: 0;
				moz-box-shadow: none;
				webkit-box-shadow: none;
				box-shadow: none;
			}

			.split-custom-button span.ui-btn-inner {
				/* position icons in center of listitem*/
				position: relative;
				margin-top:50%;
				margin-left:50%;
				/* compensation for icon dimensions */
				top:11px; 
				left:-12px;
				height:40%; /* stay within boundaries of list item */
			}
		</style>
		
		<?php 
			
		
			
			$name=$_COOKIE["username"];
			$pass=$_COOKIE["password"];
			
			
		?>
		
		<div data-role="page"  id="index" data-theme="a" >
			<div data-role="header" >
				<div data-role="navbar">
					<ul><li><a href ="http://winenigra.com/OakdaleProject/#product-list"  class="ui-btn ui-icon-back ui-btn-icon-left"   rel="external" data-transition="flip" >
						back to the main page	
					</a></li></ul>
				</div>
			</div><!--header-->
			
			<div data-role="main" class="ui-content">
					<?php
							if(!isset($_COOKIE['username'])){
								echo "<script>alert('please login first!');</script>";
								header(	"Refresh: 5; url=http://www.winenigra.com/OakdaleProject");
								die();
							}
							
							$servername = "localhost";
							$usernameDB = "root";
							$password = "gonzo1982";
							
							$conn = mysql_connect($servername, $usernameDB, $password);
							if (!$conn) {
								die("Connection failed: " . $conn->connect_error);
							} 
							mysql_select_db("wineNigra",$conn);
							mysql_query("set names 'utf8'"); 
							$sql = "SELECT * FROM `user_info` WHERE email= '".$name."'";	
							$result = mysql_query($sql,$conn);
							if(!$result){
								 echo"query failed\n"; 
								 echo $sql;
								 die;
							}
							
							$row=mysql_fetch_array($result);
							$ID= $row['ID'];
							$NAME=$row['UName'];
							echo '<ul data-role="listview" >'; //fuck it 
							echo "Hello:";
							echo ($NAME);
							echo "</br>";
							echo "Here is your order:";
							echo "</br>";
						//	echo ($ID);
							
							
							
							$sql= "SELECT * FROM `my_order` WHERE Uid= '".$ID."'";	
							$result = mysql_query($sql,$conn);
							if(!$result){
								 echo"query failed\n"; 
								 echo $sql;
								 die;
							}
							
							$price=0;
							
							while($row=mysql_fetch_array($result)){
								$Oid= $row['Oid'];
								$PID= $row['Pid'];
							
								$sql1= "SELECT * FROM `product` WHERE Pid= '".$PID."'";	
								$result1 = mysql_query($sql1,$conn);
								
								if(!$result1){
								 echo"query failed\n"; 
								 echo $sql;
								 die;
								}
								$row1=mysql_fetch_array($result1);
								$theprice=$row1['Price'];
								echo '<li>';
								echo '<a href="#">';
									echo ($row1['PName']);
									echo  "<p>";
									echo ($row1['descripe']);
									echo ($theprice);
									echo "</p>";
								echo '</a>';
								echo '<div class="split-custom-wrapper">';
							//	echo '<a href="#" data-role="button" class="split-custom-button" data-icon="gear" data-rel="dialog" data-theme="c" data-iconpos="notext"></a>';
								echo '<a href="#" data-role="button" class="split-custom-button" data-icon="delete" data-rel="dialog" data-theme="b" data-iconpos="notext" onclick="deleted('.$Oid.')"></a>';
								echo '</div>';
								echo "</li>";
								$price=$theprice+$price;
							}
							echo '<li>the price is: ';
							echo $price;
							echo '</li>';
							echo '</ul>';
							
					?>
			</div><!--body page-->
		</div><!--page-->
		
		
		
	</body>

</html>