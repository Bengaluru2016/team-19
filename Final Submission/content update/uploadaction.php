<?php
	//$c =  
	echo $_POST['contentname'];
	echo $_POST['contentdetails'];
if(isset($_FILES['document'])){
      $errors= array();
      $file_name = $_FILES['document']['name'];
      $file_size =$_FILES['document']['size'];
      $file_tmp =$_FILES['document']['tmp_name'];
      $file_type=$_FILES['document']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['document']['name'])));
      move_uploaded_file($file_tmp,"images/".$file_name);
      }
      else
      	echo "no file";
$con=mysqli_connect("localhost","root",""); 
mysqli_select_db($con,"vill");
if(!$con)
{
  echo "<script>
    alert('something went wrong');
    window.location.href='home.html';
    </script>";
}
$name = $_POST['contentname'];
$deatails = $_POST['contentdeatails'];
$type = $_POST['contenttype'];
echo $type;
$query= "SELECT * FROM course";
$result=mysqli_query($con,$query);
	//move_uploaded_file($file_tmp,"images/".$file_name);
?>