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
		<div id="head"><h1>JPMC</h1></div>
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
  			<input type="password" name="pass1" placeholder="Password" required minlength="6" maxlength="30">
  			<input type="password" name="pass2" placeholder="Confirm Password" required minlength="6" maxlength="30">
  			<input type="date" name="dob" placeholder="mm/dd/yy" required>
  			<select name="gender" placeholder="gender" required>
  				<option value="male">Male</option>
  				<option value="female">Female</option>
  			</select>
        <select name="type" placeholder="gender" required>
          <option value="user">User</option>
          <option value="staff">Staff</option>
          <option value= "mentor">Mentor </option>
        </select>
  			<button type="submit">REGISTER</button>
			</form><br>
		</div> 
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"new_database");
if(!$con)
{
  echo "connection failed..";
}

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['dob']) && isset($_POST['gender']))
{
  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
  $name=$firstname."".$lastname;
  $password1=$_POST['pass1'];
  $password2=$_POST['pass2'];
  $mail=$_POST['email'];
  $dobh=$_POST['dob'];
  $sex=$_POST['gender'];
  $type=$_POST['type'];
  if($type=='staff')
  {
    echo "working";
    $type1=1;
  }
  else if($type=='user')
  {
    echo "working";
    $type1=0;
  }
  else
  {
    echo "working";
    $type1=2;
  }

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
      $query="select user_mail from user_info where user_mail='$mail'";
      $result=mysqli_query($con,$query);
      $no_rows=mysqli_num_rows($result);
      if($no_rows==1)
      {
        echo "<script> 
        alert('entered mail is already registered');
         window.location.href='sign_up.php';
             </script>";
      }
      else
      {
       $sql1="insert into user_info(user_name,user_mail,user_password,user_city,user_mob,user_gender,user_type,user_date_of_birth) values('$name','$mail','$password1','$city','$mobile','$sex',$type1,'$dobh')"; 
        if(mysqli_query($con,$sql1))
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
