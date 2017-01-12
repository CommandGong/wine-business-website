<!DOCTYPE html ><head>
<?php 
$servername = "db4free.net";
$username = "teampi";
$password = "cosc4f00";
$dbname = "cp4f00";

// Create connection
$conn = mysql_connect($servername, $username, $password);
if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
   }
 
mysql_select_db("cp4f00",$conn);
// Check connection

$username = $_GET['email'];
$password= $_GET['password'];

$sql = "SELECT emailAddress, password FROM users WHERE emailAddress='" . $username ."' AND password='" . $password. "'";


$result = mysql_query($sql,$conn);


if(!$result){ echo"failed\n"; }



if (mysql_num_rows($result)>0) {
		
	
} else {
    header("Location: sample/index.html#two");
}

?>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="theme/sample2/themes/sample2.css" />
<link rel="stylesheet" href="theme/sample2/themes/sample2.min.css"/>
<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css"/>
<link rel="stylesheet" type="text/css" href="http://cdn.jtsage.com/datebox/latest/jqm-datebox.min.css">

<script type="text/javascript" src="jquery-ui-1.11.3/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
<!-- "mobiscroll -->

    
    <script src="mobiscroll/js/mobiscroll.custom-2.5.0.min.js" type="text/javascript"></script>
    <link href="mobiscroll/css/mobiscroll.custom-2.5.0.min.css" rel="stylesheet" type="text/css" />
  
</head>

<!-- "mobiscroll -->


<!-- Mar23 autocomplete-->

<script>



</script>
<style>

.ui-filter-inset {
    margin-top: 0;
}
#p2{
	width: 100%;
	height: 100%;
}
#one{
	width: 100%;
	height: 100%;
}
#two{
	width: 100%;
	height: 100%;
}

</style>

<!-- Mar23 autocomplete-->

<body>

	<div data-role="page"  id="p1" data-theme="a">
    	<div data-role="header" data-position="fixed">
        	<div data-role="navbar">
            	<ul>
                	<li><a href="#p1" data-icon="home" data-transition="flip"></a></li>
                    <li><a href="#search" data-icon="search" data-transition="slidedown"></a></li>
                    <li><a href="#profile" data-icon="gear"></a></li>
                    <li><a href="#profile" data-icon="user" >Welcome <?php echo($username);?></a></li>
                </ul>
            </div> 
          
         </div> 
         
           <div data-role="main">
				<a href="#search" data-transition="slidedown"><img src="1.jpg" id = "p2" /></a>
				<p>Popular Tips  </p>
		 
				<div data-role="controlgroup" >
					<a href="#" ><img src="12.jpg" id = "one" /></a> 
					<a href="#" ><img src="13.jpg" id = "two" /></a>
				</div>
		 
         </div>
         
         <div data-role="footer" data-position="fixed">
         	<p>&copy;footer</p>
         </div>
         
     </div><!--main page  -->
     
    <div data-role="page"  id="profile" data-theme="a">
    	<div data-role="header" data-position="fixed">
        	
            <div data-role="navbar">
            	<ul>
                	<li><a href="#p1" data-icon="home" data-transition="flip" ></a></li>
                    <li><a href="#search" data-icon="search" data-transition="slidedown"></a></li>
                    <li><a href="#profile" data-icon="gear"></a></li>
                    <li><a href="#profile" data-icon="user" >Welcome <?php echo($username);?></a></li>
                </ul>
            </div> 
        </div> 
         
         <div data-role="main" class="ui-content">
			<?php 	
			
			echo("<p>hello ".$username."</p>");
			echo("<p>traval info goes here </p>");
			
			
			?>
           <a href="#p1" data-role="button" data-inline="true" data-transition="flip" data-icon="carat-r" data-iconpos="right"> 
           	Back to main page
           </a>
           
         </div>
         
         <div data-role="footer" data-position="fixed">
         	<a href="#" class="ui-btn ui-btn-e" > Book a Seat</a>
         </div>
         
     </div><!--profile page  -->
     
     <div data-role="page" id="search" data-theme="a">
    	 <div data-role="header" data-position="fixed">
        	
            <div data-role="navbar">
            	<ul>
                	<li><a href="#p1" data-icon="home" data-transition="flip"></a></li>
                    <li><a href="#search" data-icon="search" data-transition="slidedown"></a></li>
                    <li><a href="#profile" data-icon="gear"></a></li>
					<li><a href="#profile" data-icon="user" >Welcome <?php echo($username);?></a></li>
                </ul>
            </div> 
          
        </div> 
     	
        
    <div data-role="content">
          	<center><p id="nothere">Arrive date</p></center>
			
			  
    <script>
	window.onload = function(){


		$("#hide1").hide();
		$("#hide2").hide();
	}
	
	$(document).on('pageinit', '#search', function () {
    // create a datepicker with default settings
		$("#scroller").mobiscroll().time({theme:'android-holo'}); // Shorthand for: $("#scroller").mobiscroll({ preset: 'date' });
	});
	
		$(document).on('pageinit', '#search', function () {
    // create a datepicker with default settings
		
		$("#scroller1").mobiscroll().date({theme:'android-holo'}); // Shorthand for: $("#scroller").mobiscroll({ preset: 'date' });
	});
	

	function autofrom(a){
		

		$("#li1").closest("ul").prev("form").find("input").val(a);
	/*
	var dep=document.getElementsByTagName("input")[1].value;
		var inp = document.createElement("input");
			inp.type = "text";
			inp.name = "depn";
			inp.id="depid";
			inp.value= dep;
			alert(inp.value);
	*/
		
		document.getElementById("hide1").value=document.getElementsByTagName("input")[1].value	
		$("li1").hide();
		$( "#departure" ).listview( "refresh" );
		$("li1").show();
	}
	function autoto(a){
		
		$("#li2").closest("ul").prev("form").find("input").val(a);
		
		$("li2").hide();
		$( "#targetP" ).listview( "refresh" );
		$("li2").show();
	}

	function tog(){
	
	}
	
	 </script>
	 <form action="searchresultApril17.php" method="GET" data-ajax="false">
			 <fieldset>
			<input type="text" name="scroller1" id="scroller1"  />
            
            <div class="ui-grid-a">
            	<div class="ui-block-a">
				
					<ul  data-role="listview" data-filter="true"   data-filter-reveal="true" data-filter-placeholder="where" data-inset="true" name="departureN" id="departure" onclick="tog();" >
						
						<li id="li1"><a href="#" onclick="autofrom('St.Catharines ');">St.Catharines</a></li>
						<li id="li"><a href="#" onclick="autofrom('Toronto ');">Toronto </a></li>
						<li id="li"><a href="#" onclick="autofrom('Ottwa ');">Ottwa</a></li>
						<li id="li"><a href="#" onclick="autofrom('Mississauga ');">Mississauga</a></li>
						<li id="li"><a href="#" onclick="autofrom('Buffalo ');">Buffalo</a></li>
						<li id="li"><a href="#" onclick="autofrom('Montreal ');">Montreal </a></li>
					</ul>
				
				
                </div>
                <div class="ui-block-b">
              	<ul  data-role="listview" data-filter="true"   data-filter-reveal="true" data-filter-placeholder="to" data-inset="true" name="targetN" id="targetP"  >
						
						<li id="li2"><a href="#" onclick="autoto('St.Catharines ');">St.Catharines</a></li>
						<li id="li"><a href="#" onclick="autoto('Toronto ');">Toronto </a></li>
						<li id="li"><a href="#" onclick="autoto('Ottwa ');">Ottwa</a></li>
						<li id="li"><a href="#" onclick="autoto('Mississauga ');">:Mississauga </a></li>
						<li id="li"><a href="#" onclick="autoto('Buffalo ');">Buffalo</a></li>
						<li id="li"><a href="#" onclick="autoto('Montreal ');">Montreal</a></li>
				</ul>
				</div>
				
            </div>	
			
		

			
			
        	 <input type = "text" name="scroller2" id="scroller" />
			<button type="submit" value="submit" data-theme="b">Submit</button>
		    <input type="text" name="depnn" id="hide1"   />
			<input type="text" name="targetn" id="hide2"   />
			 </fieldset>
		</form>
        </div>
		
		
     	<div data-role="footer" data-position="fixed">&Omega; footer</div>
     </div><!--searching page  -->
     
     
     
     <div data-role="page" id="searchResult" data-theme="a">
    	 <div data-role="header" data-position="fixed">
        	
            <div data-role="navbar">
            	<ul>
                	<li><a href="#p1" data-icon="home" data-transition="flip"></a></li>
                    <li><a href="#search" data-icon="search" data-transition="slidedown"></a></li>
                    <li><a href="#profile" data-icon="gear"></a></li>
                    <li><a href="#profile" data-icon="user" >Welcome <?php echo($username);?></a></li>
                </ul>
            </div> 
          
        </div> 
     	
        
        <div data-role="content">
          <a href="#" class="ui-btn" > Apply Filters</a>
          
        </div>
     	<div data-role="footer" data-position="fixed">&Omega; footer</div>
     </div><!--searching  result page  -->
       
          
                       
</body>
</html>
