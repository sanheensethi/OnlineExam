<?php
	session_start();
	include "header.php";
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Answer Submitter !
      <small>Live Editor</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Question Bank</a></li>
      <li class="active">Answer Submitter</li>
    </ol>
  </section>
  
  <section id="frameCon">
  <section class="content">
  
    <div class='row'>
      <div class='col-md-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Result<small></small></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
          </div><!-- /.box-header -->
          <div class='box-body pad'>
          <form>
              <iframe id="frame" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
            </form>
          </div>
        </div>
      </div><!-- /.col-->
    </div><!-- ./row -->
  </section><!-- /.content -->
  </section>
  <!-- Main content -->
  <section id="questionForm">
  <section class="content">

    <div class='row'>
      <div class='col-md-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>[ ANSWER ] MathJax Live Editor<small></small></h3>
            <!-- tools box --><br>
            <br><br>
<div class="form-group">
	<button id="autoShow" class="btn btn-warning">SHOW QUESTION</button>
	<button id="autoHide" class="btn btn-danger">HIDE</button><br>
	<section id="autofillcon">
	<label>Question Id : <span style="color:#f00;">*(autofill)</span></label>
	<input type="number" id="questionid" class="form-control" value="<?echo $_GET['id']; ?>" placeholder="Question ID" disabled required/>
	<br>
	<?php
		include "../../system/db/myDataBase.php";
		$exam = new myDataBaSe();
		$exam->query = "SELECT question,optiona,optionb,optionc,optiond,option_answer,imgdata,imgheight,imgwidth FROM QUESTIONS WHERE ques_id=".$_GET['id'];
		$result = $exam->query_result();
		extract($result[0]);
		if($option_answer){
	?>
		<h3>Question :</h3><br>
		<!-- Show Question Here -->
		<?=$question; ?>
		<hr />
		<img src='<?=$imgdata ?>' 
		style='height:<?=$imgheight ?>px;width:<?= $imgwidth ?>px'\><br>
		<hr />
		<h3>Select Answer : </h3><br>
		<!-- Show Options Here -->
		<label class='cont'>1.
		<input type='radio' name='option'>
		<span class='checkmark'></span><?= $optiona; ?>
		</label><br>
		<label class='cont'>2.
		<input type='radio' name='option'>
		<span class='checkmark'></span><?= $optionb; ?>
		</label><br>
		<label class='cont'>3.
		<input type='radio' name='option'>
		<span class='checkmark'></span><?= $optionc; ?>
		</label><br>
		<label class='cont'>4.
		<input type='radio' name='option'>
		<span class='checkmark'></span><?= $optiond; ?>
		</label><br>
	<? } ?>
	</section>
</div>
<div class="form-group">
<img class="imgc"\"><br>
<label>Image File</label>
	<input type="file" class="form-control" onchange="encodeImagetoBase64(this)" id="file">
<input type="hidden" id="imgdat">
<label for="">Width :</label>
<input type="number" placeholder="width" class="form-control" style="width:100px" onkeyup="imgsize()" id="imgwidth">
<label for="">Height :</label>
<input type="number" placeholder="height" class="form-control" style="width:100px" onkeyup="imgsize()" id="imgheight">
</div>
      	      <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
            
  	        </div><!-- /.box-header -->
   	       <div class='box-body pad'>
   	       <label>Type Answer : </label>
            <form>
              <textarea id="math" placeholder="Write Question Here." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <button id="ansendshow" class="btn btn-success">Next</button>
            <button id="aendhide" class="btn btn-danger">Hide</button>
            </div>
        </div>
      </div><!-- /.col-->
 	   </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 </section><!-- Question Section Ends. -->
 	 
 	 <section id="videoLink" class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'><small></small></h3>
 	 <!-- tools box -->
 	 
 	 <label>Answer Video Link : </label>
 	 <!--<form>
 	 <iframe src="mathjax-data/option.A.html" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
 	 </form>-->
 	 <form>
 	 <input type="url" class="form-control" id="alink" placeholder="Video Link." style="" required></textarea>
 	 </form>
 	 <br>
 	 <button id="anspreviousShow" class="btn btn-info">Previous</button>
 	 <button id="bShow" class="btn btn-success">Next</button>
 	 <button id="vhide" class="btn btn-danger">Hide</button>
 	 </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 
 	 <section id="buttonsShow" class="content">
 	 	<button id="qshow" class="btn btn-warning">ANSWER Form Show</button><br><br>
 	 	<div id="s">
 	 	<a id="edit_pq"><button id="edit" class="btn btn-danger">Edit Last Question Answer</button></a>
 	 	</div>
 	 </section>
 	 <section class="content" id="finalDecision">
 	 	<a href="mathjax-data/preview.php"><button id="preview" class="btn btn-primary">Preview</button></a>
 	 	<button id="asubmit" class="btn btn-success">Submit</button>
 	 </section>
 	 <section id="show" class="content">
 	 <div class="box">
 	 <div class="box-header with-border">
 	 <h3 class="box-title">Message</h3>
 	 <div class="box-tools pull-right">
 	 <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 	 <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
 	 </div>
 	 </div>
 	 <div class="box-body">
 	 Data
 	 </div><!-- /.box-body -->
 	 <div class="box-footer">
 	 Last Input ID
 	 </div><!-- /.box-footer-->
 	 </div><!-- /.box -->
 	 </section>
  <?php
  include "footer.php";
  ?>
  <script>
  	$('#questionForm').hide();
  	$('#finalDecision').hide();
  	$('#autoHide').hide();
  	$('#autofillcon').hide();
  	$('#frameCon').hide();
  	$('#videoLink').hide();
  	$('#s').hide();
  	
  $(document).ready(function(){
  	
  	$('#autoShow').on('click',function(e){
  		e.preventDefault();
  		$('#autofillcon').show('slow','linear');
  		$('#autoShow').hide('slow','linear');
  		$('#autoHide').show('slow','linear');
  	});
  	
  	$('#autoHide').on('click',function(e){
  		e.preventDefault();
  		$('#autofillcon').hide('slow','linear');
 	 	$('#autoShow').show('slow','linear');
  		$('#autoHide').hide('slow','linear');
  	});
  	
  	$('#aendhide').on('click',function(e){
  		e.preventDefault();
  		$('#questionForm').hide('slow','linear');
  		$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#qshow').on('click',function(e){
  		e.preventDefault();
  		$('#questionForm').show('slow','linear');
  		$('#buttonsShow').hide('slow','linear');
  		$('#frameCon').hide('slow','linear');
  		$('#frame').attr('src','');
  	});
  	
  	$('#ansendshow').on('click',function(e){
  		e.preventDefault();
  		$('#questionForm').hide('slow','linear');
  		$('#finalDecision').hide();
  		$('#videoLink').show('slow','linear');
  	});
  	
  	$('#vhide').on('click',function(e){
  		e.preventDefault();
  		$('#videoLink').hide('slow','linear');
  		$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#anspreviousShow').on('click',function(e){
  		e.preventDefault();
  		$('#videoLink').hide('slow','linear');
  		$('#questionForm').show('slow','linear');
  	});
  	
  	$('#bShow').on('click',function(e){
  		e.preventDefault();
  		$('#finalDecision').show('slow','linear');
  		$('#videoLink').hide('slow','linear');
  		$('#buttonsShow').show('slow','linear');
  		$('#frameCon').show('slow','linear');
  		callLive();
  		$('#frame').attr('src','mathjax-data/answer.html');
  	});
  	
  	function callLive(){
  		//$('#show').html($('#math').val());
  		imagdat       = $("#imgdat").val();
  		imgheight     = $("#imgheight").val();
  		imgwidth      = $("#imgwidth").val();
  		
  		$.ajax({
  			url:'mathjax-file-answer.php',
  			type:'POST',
  			data:{math:$('#math').val()},
  			success:function(dat){
  				$('#show').html(dat);
  			}
  		});
  	}
  	
  	$('#show').hide();
  	
  	$('#asubmit').on('click',function(){
  		
  		var questionid
  		var imagdat
  		var imgheight
  		var imgwidth
  		var ans
  		
  		questionid    = "<?= $_GET['id']; ?>";
  		ans           = $("#math").val();
  		link          = $("#alink").val();
  		imagdat       = $("#imgdat").val();
  		imgheight     = $("#imgheight").val();
  		imgwidth      = $("#imgwidth").val();
  		
  		$.ajax({
  			url:'../ajax.php',
  			type:'POST',
  			data:{
  				page:'answer',
  				action:'submit',
  				ques_id:questionid,
  				math:ans,
  				alink:link,
  				img:imagdat,
  				imgh:imgheight,
  				imgw:imgwidth
  			},
  			success:function(dat){
  				$('#show').show("fast","linear");
  				$('#show').html(dat);
  				
  				$("#edit_pq").attr("href",'edit_question.php?id='+"<?= $_GET['id']; ?>");
  				setTimeout(function(){
  					$('#show').hide("slow","linear");
  					window.location.href="QUESTION_LIST.php";
  				},10000);
  				
  				question      = $("#math").val('');
  				imagdat       = $("#imgdat").val('');
  				imgheight     = $("#imgheight").val('');
  				imgwidth      = $("#imgwidth").val('');
  				$('#s').show('slow','linear');
  			}
  		});
      
  	});
  });
  
  function encodeImagetoBase64(element) {
  
  	  var file = element.files[0];
  
  	  var reader = new FileReader();
  	
  	  reader.onloadend = function() {
  
  	    $(".imgc").attr("src",reader.result);
  
  	    $(".imgc").text(reader.result);
  		
  		$("#imgdat").attr("value",reader.result);
  	  }
  
  	  reader.readAsDataURL(file);
  
  	}
  function imgsize(){
  	var wid = $("#imgwidth").val();
  	var hg = $("#imgheight").val();
  	$(".imgc").css({"width":wid,"height":hg});
  }
  
  

  
  </script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  