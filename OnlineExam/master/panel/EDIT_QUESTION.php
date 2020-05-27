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
  <!-- Main content -->
  
  <section id="frameCon" class="content">
  
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
  <iframe id="frameUrl" src="" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></iframe>
  </form>
  </div>
  </div>
  </div><!-- /.col-->
  </div><!-- ./row -->
  </section><!-- /.content -->
  
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
              <textarea id="math" placeholder="Write Question Here." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <label>OPTION A : </label>
            <form>
            <textarea id="opa" placeholder="Option A." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <label>OPTION B : </label>
            <form>
            <textarea id="opb" placeholder="Option B." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <label>OPTION C : </label>
            <form>
            <textarea id="opc" placeholder="Option C." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <br>
            <label>OPTION D : </label>
            <form>
            <textarea id="opd" placeholder="Option D." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </form>
            <button id="qendashow" class="btn btn-success">Next</button>
            <button id="qendhide" class="btn btn-danger">Hide</button>
            </div>
        </div>
      </div><!-- /.col-->
 	   </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 </section><!-- Question Section Ends. -->
 	 
 	 <section id="answerForm">
 	 <section class="content">
 	 
 	 <div class='row'>
 	 <div class='col-md-12'>
 	 <div class='box'>
 	 <div class='box-header'>
 	 <h3 class='box-title'>[ANSWER] MathJax Live Editor<small></small></h3>
 	 <!-- tools box -->
 	 <div class="form-group">
 	 <label>Video Link : </label>
 	 <input type="link" class="form-control" id="alink">
 	 
 	 <img class="ansimgc"\"><br>
 	 <label>Image File</label>
 	 <input type="file" class="form-control" onchange="ansencodeImagetoBase64(this)" id="ansfile">
 	 <input type="hidden" id="ansimgdat">
 	 <label for="">Width :</label>
 	 <input type="number" placeholder="width" class="form-control" style="width:100px" onkeyup="ansimgsize()" id="ansimgwidth">
 	 <label for="">Height :</label>
 	 <input type="number" placeholder="height" class="form-control" style="width:100px" onkeyup="ansimgsize()" id="ansimgheight">
 	 </div>
 	 <div class="pull-right box-tools">
 	 <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
 	 <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
 	 </div><!-- /. tools -->
 	 </div><!-- /.box-header -->
 	 <div class='box-body pad'>
 	 <label>Type Answer : </label>
 	 <form>
 	 <textarea id="anstext" placeholder="Write Question Here." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
 	 </form>
 	 <br>
 	 <button id="previousShow" class="btn btn-info">Previous</button>
 	 <button id="nextShow" class="btn btn-success">Next</button>
 	 <button id="aendhide" class="btn btn-danger">Hide</button>
 	  </div>
 	 </div>
 	 </div><!-- /.col-->
 	 </div><!-- ./row -->
 	 </section><!-- /.content -->
 	 </section>
 	 <section id="buttonsShow" class="content">
 	 	<button id="qshow" class="btn btn-warning">Question Form Show</button><br><br>
 	 	<button id="ashow" class="btn btn-success">Answer Form Show</button><br><br>
 	 </section>
 	 <section class="content" id="finalDecision">
 	 	<a href="mathjax-data/preview.php"><button id="preview" class="btn btn-primary">Preview</button></a>
 	 	<button id="update" class="btn btn-success">Update</button>
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
  $(document).ready(function(){
  
  $('#anstext').on('keyup',function(){
  	//$('#show').html($('#math').val());
  	$.ajax({
  		url:'mathjax-file-answer.php',
  		type:'POST',
  		data:{math:$('#anstext').val()},
  		success:function(dat){
  			$('#show').html(dat);
  		}
  	});
  	
  	$('#frameCon').show('slow','linear');
  	$('#frameUrl').attr('src','mathjax-data/answer.html');
  	
  });
  
  
  $('#questionForm').hide();
  $('#answerForm').hide();
  $('#finalDecision').hide();
  $('#autoHide').hide();
  $('#autofillcon').hide();
  $('#frameCon').hide();
  
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
    $('#frameCon').hide('slow','linear');
    $('#frameUrl').attr('src','');
  });
  
  $('#aendhide').on('click',function(e){
  	e.preventDefault();
  	$('#answerForm').hide('slow','linear');
  	$('#buttonsShow').show('slow','linear');
  	$('#frameCon').hide('slow','linear');
  	$('#frameUrl').attr('src','');
  });
  
  $('#qshow').on('click',function(e){
  	e.preventDefault();
  	$('#buttonsShow').hide('slow','linear');
  	$('#questionForm').show('slow','linear');
  	$('#finalDecision').hide('slow','linear');
  });
  
  $('#ashow').on('click',function(e){
  	e.preventDefault();
  	$('#buttonsShow').hide('slow','linear');
  	$('#answerForm').show('slow','linear');
  	$('#finalDecision').hide('slow','linear');
  });
  
  $('#qendashow').on('click',function(e){
  	e.preventDefault();
  	$('#buttonsShow').hide('slow','linear');
  	$('#questionForm').hide('slow','linear');
  	$('#answerForm').show('slow','linear');
  	$('#finalDecision').hide('slow','linear');
  	$('#frameCon').hide('slow','linear');
  	$('#frameUrl').attr('src','');
  });
  
  $('#previousShow').on('click',function(e){
  	e.preventDefault();
  	$('#buttonsShow').hide('slow','linear');
  	$('#answerForm').hide('slow','linear');
  	$('#questionForm').show('slow','linear');
  	$('#finalDecision').hide('slow','linear');
  });
  
  $('#nextShow').on('click',function(e){
  	e.preventDefault();
  	$('#buttonsShow').show('slow','linear');
  	$('#questionForm').hide('slow','linear');
  	$('#answerForm').hide('slow','linear');
  	$('#finalDecision').show('slow','linear');
  	$('#edit_pq').hide('slow','linear');
  	
  	imagdat       = $("#imgdat").val();
  	imgheight     = $("#imgheight").val();
  	imgwidth      = $("#imgwidth").val();
  	opa           = $("#opa").val();
  	opb           = $("#opb").val();
  	opc           = $("#opc").val();
  	opd           = $("#opd").val();
  	
  	$.ajax({
  	url:'mathjax-file-question.php',
  	type:'POST',
  	data:{math:$('#math').val(),optionA:opa,optionB:opb,optionC:opc,optionD:opd,img:imagdat,imgh:imgheight,imgw:imgwidth},
  	success:function(dat){
  	$('#show').html(dat);
  	}
  	});
  	
  	$('#frameCon').show('slow','linear');
  	$('#frameUrl').attr('src','mathjax-data/question.html');
  	
  });
  
  
  	var qid = "<?php echo $_GET['id'] ?>";
  	function fetchdata(id){
  	
  		$.ajax({
  			url:'../ajax.php',
  			type:'POST',
  			data:{
  				page:'edit_question',
  				action:'fetch_data',
  				qid:id
  			},
  			success:function(dat){
  				//$("#shown").html(dat);
  				var data = $.parseJSON(dat);
  				//alert(data[1]['linkanswer']);
  				$("#math").val(data[0]['question']);
  				$("#answer").val(data[0]['option_answer']);
  				$("#imgdat").val(data[0]['imgdata']);
  				$("#imgheight").val(data[0]['imgheight']);
  				$("#imgwidth").val(data[0]['imgwidth']);
  				$("#difficulty").val(data[0]['difficulty']);
  				$("#priority").val(data[0]['priority']);
  				$("#coursecode").val(data[0]['course_id']);
  				$('#subjectcode').val(data[0]['subject_id']);
  				$('#chaptercode').val(data[0]['chapter_id']);
  				$("#alink").val(data[1]['linkanswer']);
  				$("#ansimgdat").val(data[1]['ans_imgdat']);
  				$("#ansimgheight").val(data[1]['ans_imgh']);
  				$("#ansimgwidth").val(data[1]['ans_imgw']);
  				$("#anstext").val(data[1]['textanswer']);
  				$("#opa").val(data[0]['optiona']);
  				$("#opb").val(data[0]['optionb']);
  				$("#opc").val(data[0]['optionc']);
  				$("#opd").val(data[0]['optiond']);
  			}
  		});
  		
  	}
  	
  	fetchdata(qid);
  	
  	$('#show').hide();
  	$('#alrt').hide();
  	
  	$('#update').on('click',function(){
  		
  		var question
  		var answer
  		var imagdat
  		var imgheight
  		var imgwidth
  		var code
  		var difficulty
  		var priority
  		
  		qid           = "<?php echo $_GET['id'] ?>";
  		question      = $("#math").val();
  		answer        = $("#answer").val();
  		imagdat       = $("#imgdat").val();
  		imgheight     = $("#imgheight").val();
  		imgwidth      = $("#imgwidth").val();
  		difficulty    = $("#difficulty").val();
  		priority      = $("#priority").val();
  		coursecode    = $("#coursecode").val();
  		subjectcode   = $("#subjectcode").val();
  		chaptercode   = $("#chaptercode").val();
  		anslink       = $("#alink").val();
  		ansimgdat     = $("#ansimgdat").val();
  		ansimgheight  = $("#ansimgheight").val();
  		ansimgwidth   = $("#ansimgwidth").val();
  		anstext       = $("#anstext").val();
  		optiona       = $("#opa").val();
  		optionb       = $("#opb").val();
  		optionc       = $("#opc").val();
  		optiond       = $("#opd").val();
  		
  		$.ajax({
  			url:'../ajax.php',
  			type:'POST',
  			data:{
  				page:'edit_question',
  				action:'update',
  				ques_id:qid,
  				math:question,
  				ans:answer,
  				opa:optiona,
  				opb:optionb,
  				opc:optionc,
  				opd:optiond,
  				img:imagdat,
  				imgh:imgheight,
  				imgw:imgwidth,
  				difficult:difficulty,
  				prior:priority,
  				cid:coursecode,
  				sid:subjectcode,
  				chpid:chaptercode,
  				atext:anstext,
  				alink:anslink,
  				aimg:ansimgdat,
  				aimgh:ansimgheight,
  				aimgw:ansimgwidth
  			},
  			success:function(dat){
  				$('#show').show("fast","linear");
  				$('#show').html(dat);
  				
  				lid = $('#q_last_id').val();
  				$("#edit_pq").attr("href",'edit_last_question.php?id='+lid);
  				
  				setTimeout(function(){
  					$('#show').hide("slow","linear")
  				},10000);
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
  
  
  //For Answer :
  
  function ansencodeImagetoBase64(element) {
  
  	  var ansfile = element.files[0];
  
  	  var reader = new FileReader();
  	
  	  reader.onloadend = function() {
  
  	    $(".ansimgc").attr("src",reader.result);
  
  	    $(".ansimgc").text(reader.result);
  		
  		$("#ansimgdat").attr("value",reader.result);
  	  }
  
  	  reader.readAsDataURL(ansfile);
  
  	}
  function ansimgsize(){
  	var wid = $("#ansimgwidth").val();
  	var hg = $("#ansimgheight").val();
  	$(".ansimgc").css({"width":wid,"height":hg});
  }
  
  </script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  