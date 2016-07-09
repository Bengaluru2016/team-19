<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="sign_up.css">
    <title>Signup</title>
</head>
<body>
	<div>
		<div id="head"><h1>Visveshwaraih bank</h1></div>
	<div class="header">
			<ul>
			<li><a href="index.html">Home</a></li>
  			<li><a href="about.html">about</a></li>
  			<li><a href="branches.php">branches</a></li>
  			<li><a href="atms.php">ATMs</a></li>
			<li><a href="sign_in.html">Sign In</a></li>
			<li><a href="sign_up.php" class="active">Sign Up</a></li>
			
			</ul>
	</div>
	</div>
	
		<div id="reg">
			<form action="sign_up.php" method="POST">
  			<input type="text" name="fname" placeholder="Fname" required>
  			<input type="text" name="lname" placeholder="Lname" required>
  			<input type="email" name="email" placeholder="Email-Id" required>
        <input type="text" name="city" placeholder="city" required>
        <input type="text" name="mobile" placeholder=" 10-digit Mobile No" required>
  			<input type="password" name="pass1" placeholder="Password" required minlength="6" maxlength="20">
  			<input type="password" name="pass2" placeholder="Confirm Password" required minlength="6" maxlength="15">
  			<input type="date" name="dob" placeholder="mm/dd/yy" required>
  			<select name="gender" placeholder="gender" required>
  				<option value="male">Male</option>
  				<option value="female">Female</option>
  			</select>
  			<button type="submit">REGISTER</button>

			</form><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="sign_in.html">Already Have an account?</a>
		</div> 
</body>
</html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("banking",$con);
if(!$con)
{
  echo "connection failed..";
}

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['dob']) && isset($_POST['gender']))
{
  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
  $password1=$_POST['pass1'];
  $password2=$_POST['pass2'];
  $mail=$_POST['email'];
  $dobh=$_POST['dob'];
  $sex=$_POST['gender'];
  $city=$_POST['city'];
  $mobile=$_POST['mobile'];

  if(!empty($firstname) && !empty($lastname)&& !empty($mail)&& !empty($password1)&& !empty($password1)&& !empty($dobh)&& !empty($sex))
  {
    if($password1!=$password2)
    {
      echo "<script> alert('Password do not match'); window.location.href='sign_up.php';
            </script>";
    }
    else
    {
      $pass=md5($password1);
      $sql=mysql_query("select email from users where email='$mail'");
      $no_rows=mysql_num_rows($sql);
      if($no_rows==1)
      {
        echo "<script> 
        alert('entered mail is already registered');
         window.location.href='sign_up.php';
             </script>";
      }
      else
      {
       $sql1="insert into users(name,email,pass,city,mobile_no) values('$firstname','$mail','$password1','$city','$mobile')"; 
        if(mysql_query($sql1,$con))
        {
          echo "<script> 
                alert('Account created successfully'); 
                window.location.href='sign_in.php';
                </script>";
        }
        else{
          echo "<script>
            alert('Account creation Failed');
            window.location.href='sign_up.php';
            </script>";
        }
      }

    }
  }
  else
  {
    echo "<script>
            alert('fields should not be empty');
            window.location.href='sign_up.php';
            </script>";
  }

}
else 
  $flag=0;
?>
