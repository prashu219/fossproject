<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="Userdata";
$db=mysqli_connect($servername, $username, $password,$dbname);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
 session_start();

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  $status = $_POST['attendance']; 
      
      $sql = "SELECT ID FROM user WHERE Username = '$myusername' and Password = '$mypassword'";
	  if($status == "present"){
		 $sq="UPDATE user SET wrokdays=wrokdays+1 WHERE Username='$myusername'";
		 mysqli_query($db,$sq) or die(mysqli_error($db));
		  
	  }
	  else
	  {
		  $sq2="UPDATE user SET leavedays=leavedays-1 WHERE  Username='$myusername'";
	      mysqli_query($db,$sq2) or die(mysqli_error($db));
	  }
	  
      $result = mysqli_query($db,$sql) or die(mysqli_error($db));
    
        
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
   
   <head>
      <title>Login Page</title>
      <style>
	  <link rel="stylesheet" type="text/css" href="style.css" />
	  </style>
     
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
				  <input type="radio" name="attendance" value="present" /> <label>Present</label>
				  
				   <input type="radio" name="attendance" value="absent"/><label>Absent</label> <br>
                  <input type = "submit" value = " Submit "/><br /> 
               </form>
               
              
            </div>
				
         </div>
			
      </div>

   </body>
</html>
