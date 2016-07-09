<?php require_once 'config.php';
	require 'connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quiz</title>
			<meta charset='utf-8'>
			<link rel='stylesheet' href='css/style.css'/>
			<script src="js/jquery-1.11.2.min.js"></script>
			<script src="js/watch.js"></script>
			<script>
$(document).ready(function(){
	$('#demo1').stopwatch().stopwatch('start');
	var steps = $('form').find(".questions");
	var count = steps.size();
	steps.each(function(i){
		hider=i+2;
		if (i == 0) { 	
    		$("#question_" + hider).hide();
    		createNextButton(i);
        }
		else if(count==i+1){
			var step=i + 1;
			//$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){
			
			   submit();
                
            });
	    }
		else{
			$("#question_" + hider).hide();
			createNextButton(i);
		}
		
	});
    function submit(){
	     $.ajax({
						type: "POST",
						url: "ajax.php",
						data: $('form').serialize(),
						success: function(msg) {
						  $("#quiz_form,#demo1").addClass("hide");
						  $('#result').show();
						  $('#result').append(msg);
						}
	     });
	
	}
	function createNextButton(i){
		var step = i + 1;
		var step1 = i + 2;
        $('#next'+step).on('click',function(){
        	$("#question_" + step).hide();
        	$("#question_" + step1).show();
        });
	}
	setTimeout(function() {
	      submit();
	}, 50000);
});
</script>

<script type="text/javascript">(function (){return window.SIG_EXT={}})()</script></body></html>
	</head>

	<body>
		<h1>Quiz using PHP, jQuery, Ajax and MySQL</h1>

		<?php 
		$query = "select * from questions";
		$response=mysqli_query($con,$query);?>

		<form method='post' id='quiz_form'>
			<?php while($result=mysqli_fetch_array($response)){ ?>
			<div id="question_<?php echo $result['id'];?>" class='questions'>
				<h2 id="question_<?php echo $result['id'];?>"><?php echo $result['id'].".".$result['question_name'];?></h2>
					<div class='align'>
						<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
						<label id='ans1_<?php echo $result['id'];?>' for='1'><?php echo $result['answer1'];?></label>
						<br/>
						<input type="radio" value="2" id='radio2_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
						<label id='ans2_<?php echo $result['id'];?>' for='1'><?php echo $result['answer2'];?></label>
						<br/>
						<input type="radio" value="3" id='radio3_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
						<label id='ans3_<?php echo $result['id'];?>' for='1'><?php echo $result['answer3'];?></label>
						<br/>
						<input type="radio" value="4" id='radio4_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
						<label id='ans4_<?php echo $result['id'];?>' for='1'><?php echo $result['answer4'];?></label>
						<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $result['id'];?>' name='<?php 																			echo $result['id'];?>'>
                    </div>
					<br/>
                <input type="button" id='next<?php echo $result['id'];?>' value='Next!' name='question' class='butt'/>
            </div>
            <?php }?>
		</form>
		