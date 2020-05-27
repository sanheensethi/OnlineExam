<?php
include "mathjax-script.php";
$data = '<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
	'.$ini['script'].'
</head>
<body>
 '.$_POST['math'].'
 <br>
 A)'.$_POST['optionA'].'
 <br>
 B)'.$_POST['optionB'].'
 <br>
 C)'.$_POST['optionC'].'
 <br>
 D)'.$_POST['optionD'].'
</body>
</html>';

$f = fopen('mathjax-data/question.html','w');
fwrite($f,$data);
fclose($f);

$data2 = "
	<?php 
	include '../hd.php';
	?>
	<div class='row'>
	<div class='col-md-8'>
	<div class='card'>
	<div class='card-header'>Online Exam</div>
	<div class='card-body'>
	<div id='single_question_area'>
	<h3>Question :</h3><br>
	<!-- Show Question Here -->
	".$_POST['math']."
	<hr />
	<img src='".$_POST['img']."' 
	style='height:".$_POST['imgh']."px;width:".$_POST['imgw']."px'\><br>
	<hr />
	<br />
	<div class='row'>
	<div class='col-md-6' style='margin-bottom:32px;'>
	<div class='radio'>
	<!--	<label><h4><input type='radio' name='option_1' class='answer_radio' data-question_id=''/>&nbsp;Option Title</h4></label>
	-->
	<h3>Select Answer : </h3><br>
	<!-- Show Options Here -->
	<label class='cont'>1.
	<input type='radio' name='option'>
	<span class='checkmark'></span>
	".$_POST['optionA']."
	</label>
	<label class='cont'>2.
	<input type='radio' name='option'>
	<span class='checkmark'></span>
	".$_POST['optionB']."
	</label>
	<label class='cont'>3.
	<input type='radio' name='option'>
	<span class='checkmark'></span>
	".$_POST['optionC']."
	</label>
	<label class='cont'>4.
	<input type='radio' name='option'>
	<span class='checkmark'></span>
	".$_POST['optionD']."
	</label>
	
	</div>
	</div>
	</div>
	
	<br /><br />
	<div align='center'>
	<button type='button' name='previous' class='btn btn-info' style='background-color:#0cc2ef;color:#fff;border:0;' id=''>Previous</button>
	<button type='button' name='next' class='btn btn-warning' style='background-color:#0cc2ef;color:#fff;border:0;' id=''>Next</button>
	<br><br>
	<button type='button' name='next' class='btn btn-danger' style='background-color:#8582bc; color:#fff;border:0;' id=''>Bookmark</button>
	<button type='button' name='next' class='btn btn-success' style='background-color:#46bc86;color:#fff;border:0;' id=''>Submit</button>
	</div>
	<br /><br />
	
	</div>
	</div>
	</div>
	<br />
	<div id='question_navigation_area'>
	<div class='card'>
	<div class='card-header'>Question Navigation</div>
	<div class='card-body'>
	<div class='row'>
	<div class='col-md-2' style='margin-bottom:24px;'>
	<!-- In for loop -->
	<button type='button' class='btn btn-primary' style='background-color:#f4f4f4;color:#000;' data-question_id=''''>1</button>
	</div>
	
	</div>
	</div></div>
	</div>
	</div>
	<div class='col-md-4'>
	<br />
	<div align='center'>
	<div id='exam_timer' data-timer='7200' style='max-width:400px; width: 100%; height: 200px;'></div>
	</div>
	<br />
	<div id='user_details_area'></div>		
	</div>
	</div>
	
	<script>
	
	$(document).ready(function(){
	
	$('#exam_timer').TimeCircles({ 
	time:{
	Days:{
	show: false
	},
	Hours:{
	show: true
	}
	}
	});
	});
	</script>
	</div>
	</div>
	</body>
	</html>
";

$f2 = fopen('mathjax-data/preview.php','w');
fwrite($f2,$data2);
?>