<?php
   $servername = "localhost";
$username = "root";
$password = "";
$dbname="Userdata";
$db=mysqli_connect($servername, $username, $password,$dbname);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   
   $ses_sql = mysqli_query($db,"select username from user where Username = '$user_check' ");
   
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC) or die(mysql_error());
      $login_session = $row['username'];
    
	
   
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>