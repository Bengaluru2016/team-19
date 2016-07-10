<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$con=mysqli_connect("localhost","root",""); 
mysqli_select_db($con,"new_database");
if(!$con)
{
  echo "connection failed..";
}

if (isset($_POST['email']) && isset($_POST['password']))
{
	$query3= "update user_info set loggedin='0';";
	mysqli_query($con,$query3);
	 $email1 = $_POST['email'];
	 $password1 =$_POST['password'];
	if (!empty($email1)&&!empty($password1)) 
	{
		
		$query  ="SELECT * FROM user_info WHERE user_mail='$email1' AND user_password='$password1';";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)>0)
		 {
				$_SESSION['$email']=$email1;
				$loggedin=mysqli_fetch_array($result);
				$_SESSION['city']=$loggedin['user_city'];
				$_SESSION['mobile']=$loggedin['user_mob'];
				$_SESSION['name']=$loggedin['user_name'];
				$_SESSION['type']=$loggedin['user_type'];
					if ($loggedin['loggedin']==0) 
					{


						$update_login = "UPDATE user_info SET loggedin='1' WHERE user_mail='$email1';";
						$update_login_result=mysqli_query($con,$update_login);
						
						if ($update_login_result) 
						{
							if($_SESSION['type']==0)
							header("location:users.php");
							else if($_SESSION['type']==1)
								header("location:staff.php");
							else
								header("location:mentor.php");
						}
						else
						{
							echo "<script>
						alert('something went wrong');
						window.location.href='sign_in.php';
						</script>";
						}
						
					}
					else
					{
						if($_SESSION['type']==0)
							header("location:users.php");
							else if($_SESSION['type']==1)
								header("location:staff.php");
							else
								header("location:mentor.php");
					}							
		}
		else
		{
			echo "<script>
						alert('Sorry Email id/Password donot match');
						window.location.href='sign_in.php';
						</script>";
		}
	}
	else
	{
		echo "<script>
						alert('fields should not be empty');
						window.location.href='sign_in.php';
						</script>";
	}
}

?>
<html>
<head>
	<meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="sign_up.css">
    <title>User- SignIn</title>
</head>
<body>
	<div>
		<div id="head"><h1> JPMC </h1> </div>
	
	<div id="reg">
			<form action="sign_in.php" method="POST">
  			<input type="email" name="email" placeholder="Email-Id" required>
  			<input type="password" name="password" placeholder="Password" required>
  			<button type="submit" name="">Sign In</button>
			</form><br>				
		<font size="5">New user? register <a href="sign_up.php"><b>Here</b></a></font>
		</div>
</div>
</body>
</html>
