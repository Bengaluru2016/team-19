<?php
require_once 'config.php';
require 'connect.php';
$query = "select id,question_name,answer from questions";
$response=mysqli_query($con,$query);
	 $i=1;
	 $right_answer=0;
	 $wrong_answer=0;
	 $unanswered=0;
	 while($result=mysqli_fetch_array($response)){ 
	       if($result['answer']==$_POST["$i"]){
		       $right_answer++;
		   }else if($_POST["$i"]==5){
		       $unanswered++;
		   }
		   else{
		       $wrong_answer++;
		   }
		   $i++;
	 }
	 echo "<div id='answer'>";
	 echo " Right Answer  : <span class='highlight'>". $right_answer."</span><br>";

	 echo " Wrong Answer  : <span class='highlight'>". $wrong_answer."</span><br>";

	 echo " Unanswered Question  : <span class='highlight'>". $unanswered."</span><br>";
	 echo "</div>";
?>