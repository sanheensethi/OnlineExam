<?php
	session_start();
	include "header.php";
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Question Submitter !
      <small>Live Editor</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Question Bank</a></li>
      <li class="active">Question Submitter</li>
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
            <h3 class='box-title'>[ QUESTION ] MathJax Live Editor<small></small></h3>
            <!-- tools box -->
<div class="form-group">
  <label for="sel1">Select Answer:<span style="color:red">*</span></label>
  <select class="form-control" id="answer" required>
    <option value="1">A</option>
    <option value="2">B</option>
    <option value="3">C</option>
    <option value="4">D</option>
  </select>
</div>
<div class="form-group">
	<button id="autoShow" class="btn btn-warning">SHOW AUTOFILL</button>
	<button id="autoHide" class="btn btn-danger">HIDE</button><br>
	<section id="autofillcon">
	<label>Course Id : <span style="color:#f00;">*(autofill)</span></label>
	<input type="number" id="coursecode" class="form-control" value="<?echo $_GET['cid']; ?>" placeholder="Chapter ID" disabled required/>
	<label>Subject Id : <span style="color:#f00;">*(autofill)</span></label>
	<input type="number" id="subjectcode" class="form-control" value="<?echo $_GET['sid']; ?>" placeholder="Chapter ID" disabled required/>
	<label>Chapter Id : <span style="color:#f00;">*(autofill)</span></label>
	<input type="number" id="chaptercode" class="form-control" value="<?echo $_GET['cpid']; ?>" placeholder="Chapter ID" disabled required/>
	</section>
	<label for="">Difficulty Type :<span style="color:red">*</span></label>
	<select class="form-control" id="difficulty" required>
	<option value="1">Easy</option>
	<option value="2">Medium</option>
	<option value="3">Hard</option>
	</select>
	
	<label for="">Priority :<span style="color:red">*</span></label>
	<select class="form-control" id="priority" required>
	<option value="1">Low</option>
	<option value="2">Medium</option>
	<option value="3">High</option>
	</select>
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
   	       <label>Type Question : </label>
            <form>
              <textarea id="math" placeholder="Write Question Here." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <button id="qendashow" class="btn btn-success">Next</button>
            <button id="qendhide" class="btn btn-danger">Hide</button>
            </div>
        </div>
      </div><!-- /.col-->
 	   </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 </section><!-- Question Section Ends. -->
 	 
 	 <section id="optionA" class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'><small></small></h3>
 	 <!-- tools box -->
 	 
 	 <label>OPTION A : </label>
 	 <!--<form>
 	 <iframe src="mathjax-data/option.A.html" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
 	 </form>-->
 	 <form>
 	 <textarea id="opa" placeholder="Option A." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
 	 </form>
 	 <br>
 	 <button id="qpreviousShow" class="btn btn-info">Previous</button>
 	 <button id="opbShow" class="btn btn-success">Next</button>
 	 <button id="opahide" class="btn btn-danger">Hide</button>
 	 </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 
 	 <section id="optionB" class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'><small></small></h3>
 	 <!-- tools box -->
 	 
 	 <label>OPTION B : </label>
 	 <!--<form>
 	 <iframe src="mathjax-data/option.A.html" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
 	 </form>-->
 	 <form>
 	 <textarea id="opb" placeholder="Option B." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
 	 </form>
 	 <br>
 	 <button id="opapreviousShow" class="btn btn-info">Previous</button>
 	 <button id="opcShow" class="btn btn-success">Next</button>
 	 <button id="opbhide" class="btn btn-danger">Hide</button>
 	 </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 
 	 <section id="optionC" class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'><small></small></h3>
 	 <!-- tools box -->
 	 
 	 <label>OPTION C : </label>
 	 <!--<form>
 	 <iframe src="mathjax-data/option.A.html" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
 	 </form>-->
 	 <form>
 	 <textarea id="opc" placeholder="Option C." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
 	 </form>
 	 <br>
 	  <button id="opbpreviousShow" class="btn btn-info">Previous</button>
 	  <button id="opdShow" class="btn btn-success">Next</button>
 	  <button id="opchide" class="btn btn-danger">Hide</button>
 	  </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 
 	 <section id="optionD" class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'><small></small></h3>
 	 <!-- tools box -->
 	 
 	 <label>OPTION D : </label>
 	<!-- <form>
 	 <iframe src="mathjax-data/option.D.html" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
 	 </form>-->
 	 <form>
 	 <textarea id="opd" placeholder="Option D." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
 	 </form>
 	 <br>
 	 <button id="opcpreviousShow" class="btn btn-info">Previous</button>
 	 <button id="btnShow" class="btn btn-success">Next</button>
 	 <button id="opdhide" class="btn btn-danger">Hide</button>
 	 </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 
 	 <section id="buttonsShow" class="content">
 	 	<button id="qshow" class="btn btn-warning">Question Form Show</button><br><br>
 	 	<div id="s">
 	 	<a id="edit_pq"><button id="edit" class="btn btn-danger">Edit Last Question</button></a>
 	 	<a id="answerwrite"><button id="answerPage" class="btn btn-info">Answer Last Question</button></a>
 	 	</div>
 	 </section>
 	 <section class="content" id="finalDecision">
 	 	<a href="mathjax-data/preview.php"><button id="preview" class="btn btn-primary">Preview</button></a>
 	 	<button id="qsubmit" class="btn btn-success">Submit</button>
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
  	$('#optionA').hide();
  	$('#optionB').hide();
  	$('#optionC').hide();
  	$('#optionD').hide();
  	$('#frameCon').hide();
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
  	
  	$('#qendhide').on('click',function(e){
  		e.preventDefault();
  		$('#questionForm').hide('slow','linear');
  		$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#opahide').on('click',function(e){
  	e.preventDefault();
  	$('#optionA').hide('slow','linear');
  	$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#opbhide').on('click',function(e){
  	e.preventDefault();
  	$('#optionB').hide('slow','linear');
  	$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#opchide').on('click',function(e){
  	e.preventDefault();
  	$('#optionC').hide('slow','linear');
  	$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#opdhide').on('click',function(e){
  	e.preventDefault();
  	$('#optionD').hide('slow','linear');
  	$('#buttonsShow').show('slow','linear');
  	});
  	
  	$('#qshow').on('click',function(e){
  		e.preventDefault();
  		$('#buttonsShow').hide('slow','linear');
  		$('#questionForm').show('slow','linear');
  		$('#finalDecision').hide('slow','linear');
  		$('#frameCon').hide('slow','linear');
  		$('#frame').attr('src','');
  	});
  	
  	//Option A Show
  	$('#qendashow').on('click',function(e){
  		e.preventDefault();
  		$('#questionForm').hide('slow','linear');
  		$('#optionA').show('slow','linear');
  	});
  	
  	$('#qpreviousShow').on('click',function(e){
  	e.preventDefault();
  	$('#optionA').hide('slow','linear');
  	$('#questionForm').show('slow','linear');
  	});
  	
  	$('#opbShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionA').hide('slow','linear');
  		$('#optionB').show('slow','linear');
  	});
  	
  	$('#opapreviousShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionB').hide('slow','linear');
  		$('#optionA').show('slow','linear');
  	});
  	
  	$('#opcShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionB').hide('slow','linear');
  		$('#optionC').show('slow','linear');
  	});
  	
  	$('#opbpreviousShow').on('click',function(e){
  		e.preventDefault();
  	    $('#optionC').hide('slow','linear');
  		$('#optionB').show('slow','linear');
  	});
  	
  	$('#opdShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionC').hide('slow','linear');
  		$('#optionD').show('slow','linear');
  	});
  	
  	$('#opcpreviousShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionD').hide('slow','linear');
  		$('#optionC').show('slow','linear');
  	});
  	
  	$('#btnShow').on('click',function(e){
  		e.preventDefault();
  		$('#optionD').hide('slow','linear');
  		$('#buttonsShow').show('slow','linear');
  		$('#finalDecision').show('slow','linear');
  		$('#frameCon').show('slow','linear');
  		$('#frame').attr('src','mathjax-data/question.html');
  		callLive();
  	});
  	
  	function callLive(){
  		//$('#show').html($('#math').val());
  		imagdat       = $("#imgdat").val();
  		imgheight     = $("#imgheight").val();
  		imgwidth      = $("#imgwidth").val();
  		optiona       = $('#opa').val();
  		optionb       = $('#opb').val();
  		optionc       = $('#opc').val();
  		optiond       = $('#opd').val();
  		
  		$.ajax({
  			url:'mathjax-file-question.php',
  			type:'POST',
  			data:{math:$('#math').val(),optionA:optiona,optionB:optionb,optionC:optionc,optionD:optiond,img:imagdat,imgh:imgheight,imgw:imgwidth},
  			success:function(dat){
  				$('#show').html(dat);
  			}
  		});
  	}
  	
  	$('#show').hide();
  	
  	$('#qsubmit').on('click',function(){
  		
  		var question
  		var imagdat
  		var imgheight
  		var imgwidth
  		var coursecode
  		var subjectcode
  		var chaptercode
  		var difficulty
  		var priority
  		var optiona
  		var optionb
  		var optionc
  		var optiond
  		var ans
  		
  		question      = $("#math").val();
  		optiona       = $('#opa').val();
  		optionb       = $('#opb').val();
  		optionc       = $('#opc').val();
  		optiond       = $('#opd').val();
  		answer        = $('#answer').val();
  		imagdat       = $("#imgdat").val();
  		imgheight     = $("#imgheight").val();
  		imgwidth      = $("#imgwidth").val();
  		difficulty    = $("#difficulty").val();
  		priority      = $("#priority").val();
  		coursecode    = $("#coursecode").val();
  		subjectcode   = $("#subjectcode").val();
  		chaptercode   = $("#chaptercode").val();
  		
  		$.ajax({
  			url:'../ajax.php',
  			type:'POST',
  			data:{
  				page:'question',
  				action:'submit',
  				math:question,
  				opa:optiona,
  				opb:optionb,
  				opc:optionc,
  				opd:optiond,
  				opans:answer,
  				img:imagdat,
  				imgh:imgheight,
  				imgw:imgwidth,
  				difficult:difficulty,
  				prior:priority,
  				cid:coursecode,
  				sid:subjectcode,
  				chpid:chaptercode
  			},
  			success:function(dat){
  				$('#show').show("fast","linear");
  				$('#show').html(dat);
  				
  				lid = $('#q_last_id').val();
  				$("#edit_pq").attr("href",'edit_question.php?id='+lid);
  				$("#answerwrite").attr("href",'ANSWER_WRITE.php?id='+lid);
  				setTimeout(function(){
  					$('#show').hide("slow","linear")
  				},10000);
  				
  				if(lid!=""){
  				question      = $("#math").val('');
  				imagdat       = $("#imgdat").val('');
  				imgheight     = $("#imgheight").val('');
  				imgwidth      = $("#imgwidth").val('');
  				difficulty    = $("#difficulty").val('');
  				priority      = $("#priority").val('');
  				optiona       = $('#opa').val('');
  				optionb       = $('#opb').val('');
  				optionc       = $('#opc').val('');
  				optiond       = $('#opd').val('');
  				$('#s').show('slow','linear');
  				}
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
  