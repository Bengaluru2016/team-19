<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <?php
   $con=mysqli_connect("localhost","root","");
   mysqli_select_db($con,"villlearn");
   /*if($con)
	   echo "connected";
   else
	   echo "not connectd";*/
   $nsq="select count(*) from user_course where status=0;";
   $sq="select count(*) from user_course where status=1;";
   $cq="select count(*) from user_course where status=3;";
   $nscount=mysqli_query($con,$nsq);
   $c1=mysqli_fetch_array($nscount);
   $scount=mysqli_query($con,$sq);
   $c2=mysqli_fetch_array($scount);
   $ccount=mysqli_query($con,$cq);
   $c3=mysqli_fetch_array($ccount);
   ?>
 <script type="text/javascript">
 
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		//alert("hi");
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No_of_courses'],
          ['Completed',    <?php echo $c1[0];?>],
          ['Started',      <?php echo $c2[0];?>],
          ['Not started',  <?php echo $c3[0];?>],
        ]);

        var options = {
          title: 'Completion Report',
		  //is3D: true,
		  colors: ['green','yellow','red'],
		 // color:'black'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>
<body>


<div class="container">

<div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
</body>
</html>

