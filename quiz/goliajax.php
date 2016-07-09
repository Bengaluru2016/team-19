<html>
<head>
<style>
#left {
    line-height:30px;
    background-color:#eeeeee;
    width:500px;
    float:left;
    padding:5px;
}
#right {
    width:500px;
    float:right;
    padding:10px;
}
</style>
</head>

<body>

<div id="left" name="leaderboard" class="col-sm-6">
	 <?php
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "villlearn";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 


	$cid=1;

	echo "Leaderboard for course $cid";


	$sql="select * from user_course where c_id=$cid ORDER by points DESC ";
	$result = $conn->query($sql);

	$result_length = mysqli_num_rows($result);	
	echo "<table><tr><th>User</th><th>Points</th></tr>";
	for($i = 0; $i < $result_length; $i++)
	{
     $row = mysqli_fetch_array($result);
     echo "<tr><td>" . $row["uname"]. "</td><td>" . $row["points"]. "</td></tr>";
    }
	echo "</table>";
    ?>
   </div>
 
<div name="report" id="right" class="col-sm-6">      
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
	       if($result['answer']==1){
		       $right_answer++;
		   }else if($result['answer']==5){
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		//alert("hi");
        var data = google.visualization.arrayToDataTable([
          ['right answers', '57'],
          ['wrong answers', '25' ],
          ['unanswered',  '18' ],
        ]);

        var options = {
          title: 'Completion Report',
		  //is3D: true,
		  colors: ['red','yellow','green'],
		 // color:'black'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
		
		
      }
    </script>
</div>

<div class="container">
<div id="piechart" style="width: 500px;float:right;"></div>
</div>
</body>

</html>


