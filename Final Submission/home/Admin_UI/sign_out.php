<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"new_database");
$email1=$_SESSION['$email'];
$sql1="update user_info set loggedin='0' where user_mail='$email1';";
$result=mysqli_query($con,$sql1);
if($result)
{
	sleep(1);
	session_destroy();
	echo "<script> 
		alert('logged out successfully');
		window.location.href='users.html';
	 </script>";
}
else
{
	$sql2= "update user_info set loggedin='0';"
	echo "<script> 
		alert('Error while signing out');
		window.location.href='users.html';
	 </script>";	
}
?>