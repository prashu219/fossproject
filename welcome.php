<?php
   include('session.php');
   $r=mysqli_query($db,"select leavedays from user where Username='$login_session'");
   $row=mysqli_fetch_array($r,MYSQL_ASSOC);
   $leave=$row['leavedays'];
   
   $r1=mysqli_query($db,"select wrokdays from user where Username='$login_session'");
   $row1=mysqli_fetch_array($r1,MYSQL_ASSOC);
   $work=$row1['wrokdays'];
   
   
   ?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
	  <p>Number of days worked <?php echo $work; ?></p> 
	      
		  <p>Number of leaves remaining <?php echo $leave; ?></p> 
	  
      
   </body>
   
</html>