<?php
    $conn_error = 'Couldn\'t connect.';
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_pass = '';
    $mysql_db = 'quiz';
	$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
	mysqli_select_db($con, $mysql_db);
    if(!$con){
       die($conn_error);
    }
?>