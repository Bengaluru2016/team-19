<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="regcss.css" type="text/css" />
</head>
<body bgcolor="#FF9900">  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $pass1Err = $pass2Err =$mobErr="";
$name = $email = $gender = $comment = $password1 = $password2 =$mobile = "";
$count=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	$count++;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    $count++;  
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["password1"])) {
    $pass1Err = "password is required";
  } else {
    $password1 = test_input($_POST["password1"]);
	$count++;
    // check if password is valid
    if (!preg_match("/^[a-zA-Z0-9]*$/",$password1)) {
      $pass1Err = "only letters and numbers are allowed"; 
    }    
  }

   if (empty($_POST["password2"])) {
    $pass2Err = "password2 is required";
  } else {
    $password2 = test_input($_POST["password2"]);
    $count++;
	// check if password is matching
    if ($password2 != $password1) {
      $pass2Err = "password doesnt match"; 
    }    
  }
  if (empty($_POST["phone"])) {
    $mobErr = "mobile no. is required";
  } else {
    $mobile = test_input($_POST["phone"]);
	$count++;
    // check if password is valid
    if (!preg_match("/[0-9]*/",$mobile)) {
      $mobErr = "only letters and numbers are allowed"; 
    }    
  }
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
    $count++; 
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
	  $count++;
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registration for Blackbucks</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="parse.php">  
  Name: <input type="text" name="name" placeholder="First Name">
        <input type="text" name="name2" placeholder="Sur Name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="password" name="password1">
  <span class="error">* <?php echo $pass1Err;?></span>
  <br><br>
   Retype Password: <input type="password" name="password2">
  <span class="error">* <?php echo $pass2Err;?></span>
  <br><br>
   Mobile: <input type="number" name="phone" size="10">
   <span class="error">* <?php echo $mobErr;?></span>
  
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>