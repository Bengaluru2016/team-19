<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vill Learn</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Vill</span>Learn</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="admin_dashboard.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<!--<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>-->
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<!--<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>-->
			<li class="active"><a href="update_content.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Upload</a></li>
			<!--<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>-->
			<li><a href="courses.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg>Live Cources</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<form role="form" action="http://localhost/jpmc/uploadaction.php" method="post" enctype="multipart/form-data">
		<br/>
		
		<h2>UPLOAD CONTENT</h2>
		<br/>
    <div class="form-group">
      <label for="inputdefault">Content Name</label>
      <input class="form-control" name = "contentname" id="contentname" type="text">
    </div>
    <div class="form-group">
      <label for="inputlg">Content Details</label>
      <input class="form-control input-lg" name ="contentdetails" id="contentdetails" type="text">
    </div>
    
    <div class="form-group">
      <label for="sel1">Content Type</label>
      <select class="form-control" id="contenttype" onchange="contenttypeselected()">
        <option value = "0">Video</option>
        <option value = "1">pdf</option>
        <option value = "1">text document</option>
        </select>
    </div>
    <div id="contenttypevideo" >
          
      <label for="inputlg">Youtube Video Url</label>
      <input class="form-control input-lg" id="contenttypevideourl" type="text">
    </div>
    <div id="contenttypedocument" style="display:none;">
          
      <input type=file name="document">
    </div>

   <div class="form-group">
      <label for="sel2">Course Name</label>
      <select class="form-control input-lg" id="categorytype">
      <?php

$con=mysqli_connect("localhost","root",""); 
mysqli_select_db($con,"vill");
if(!$con)
{
  echo "<script>
    alert('something went wrong');
    window.location.href='home.html';
    </script>";
}
$query= "SELECT * FROM course";
$result=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($result)) {
            echo " <option> ".$row['course_name']."</option>";
            }
?>
      
      </select>
    </div>
    <div class="form-group">
      <label for="sel3">User Type</label>
      <select class="form-control input-sm" id="usertype">
             <option>all</option>
             <option>staff</option>
             <option>mentors</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputlg">Points</label>
      <input class="form-control input-lg" id="points" type="number">
    </div>
    <button type="submit" class="btn btn-success" >Upload</button>
  </form>
</div>
<script>
function contenttypeselected() {
    var x = document.getElementById("contenttype").value;
    var e = document.getElementById("contenttypevideo");
    var f = document.getElementById("contenttypedocument");
    if(x == "Video")
    {
         f.style.display = (e.style.display == 'block') ? 'none' : 'none';
    e.style.display = 'block';
    }
    else
    {
        e.style.display = (e.style.display == 'block') ? 'none' : 'none';
    f.style.display = 'block';
    }
}
</script>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
