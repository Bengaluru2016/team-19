<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vill Learn</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.dropbtn {
    background-color: #2C3E50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #2C3E50;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #2C3E50;
}
</style>


</head>

<body id="page-top" class="index">
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Vill Learn</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
						<div class="dropdown">
							<button class="dropbtn">LOGIN</button>
							<div class="dropdown-content">
								<a href="sign_in.php">Staff</a>
								<a href="sign_in.php">Mentor</a>
								<a href="sign_in.php">Admin</a>
							</div>
						</div>
                    </li>
					<li>
						<a href="sign_up.php">REGISTER</a>
					</li>
                    <li class="page-scroll">
                        <a href="#portfolio">Categories</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
		 <div class="container">
	<section id="portfolio">
	<center>
      <form action="sign_up.php" method="POST">
	  <br><br><br><br><br>
        <h2>Sign Up</h2>
		<br><br>
  			<input type="text" name="fname" placeholder="Fname" required><br>
  			<input type="text" name="lname" placeholder="Lname" required><br>
  			<input type="email" name="email" placeholder="Email-Id" required><br>
        <input type="text" name="city" placeholder="city" required><br>
        <input type="text" name="mobile" placeholder=" 10-digit Mobile No" required><br>
  			<input type="password" name="pass1" placeholder="Password" required minlength="6" maxlength="30"><br>
  			<input type="password" name="pass2" placeholder="Confirm Password" required minlength="6" maxlength="30"><br>
  			<input type="date" name="dob" placeholder="mm/dd/yy" required><br>
  			<select name="gender" placeholder="gender" required>
  				<option value="male">Male</option>
  				<option value="female">Female</option>
  			</select><br>
        <select name="type" placeholder="gender" required>
          <option value="user">User</option>
          <option value="staff">Staff</option>
          <option value= "mentor">Mentor </option>
        </select><br>
  			<button type="submit">REGISTER</button>
			</form><br>
		</div> 
	</center>
	</section>
	
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
