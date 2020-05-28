<?php
/* 
	SARA KAAM YHI HOTA HAI IS CODE MAE.
	Calculation , processing vagera loading sb kuch
*/
/*AJAX MODEL CALLER*/

	include "../system/db/myDataBase.php";
	include "../system/datetime/dt.php";
	$exam = new myDataBase;
	//var_dump($_POST);
	if(isset($_POST['page'])){
		
		/*Admin Login*/
		if($_POST['page']=='login'){
			if($_POST['action']=='login'){
				
				$exam->data = array(
						':admin_email_address'	=>	$_POST['admin_email_address'],
						':admin_pass' => $_POST['admin_password']
				);
				
				$exam->query = "
					SELECT * FROM ADMIN
					WHERE email= :admin_email_address && pass = :admin_pass
				";
				
				$total_row = $exam->total_row();
				
				if($total_row==1){
					$result = $exam->query_result();
					session_start();
					$_SESSION['admin_id'] = $result[0]["adminid"];
					echo "<script>window.location.href='panel/dashboard.php';</script>";
				}
				else{
					echo '<div class="alert alert-danger"> Invalid Username or Password </div>';
				}
				
			}
		}
		
		/*Question Submitter*/
		if($_POST['page']=='question'){
			if($_POST['action']=='submit'){
		/* Enter Question Function. */
		function questiondata($qdata){
		
			$exam = new myDataBase;
			$exam->data = array(
				'',
				$_POST['cid'],
				$_POST['sid'],
				$_POST['chpid'],
				$_POST['math'],
				$_POST['opa'],
				$_POST['opb'],
				$_POST['opc'],
				$_POST['opd'],
				$_POST['opans'],
				$_POST['img'],
				$_POST['imgh'],
				$_POST['imgw'],
				$_POST['difficult'],
				$_POST['prior'],
				$exam->date,
				$exam->time
			);
			$exam->query = "
				INSERT INTO QUESTIONS(ques_id,course_id,subject_id,chapter_id,question,optiona,optionb,optionc,optiond,option_answer,imgdata,imgheight,imgwidth,difficulty,priority,date,time) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		    $exam->execute_query();
			
			session_start();
			$_SESSION['last_inserted_id'] = $exam->lastID();	
			
			return $exam->lastID();
		}
		
		function showdata($message='',$color='green',$lastid=''){
		return '<div class="box">
			<div class="box-header with-border">
			<h3 class="box-title">Message</h3>
			<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
			</div>
			<input type="hidden" id="q_last_id" value="'.$lastid.'">
			<div class="box-body"><h2>
			<span style="color:'.$color.'">'.$message.'</span>
			</h2></div><!-- /.box-body -->
			<div class="box-footer">
			Last Input ID : '.$lastid.'
			</div><!-- /.box-footer-->
			</div><!-- /.box -->';
		}
				if($_POST['opa'] =="" || $_POST['opb']=="" || $_POST['opc']=="" || $_POST['opd']==""){
					echo showdata('Some of the Option field is Empty.','red','');
					exit();
				}
						if($_POST['math']==""){
								echo showdata('Question Field is Empty','red','');
							//echo "Question field is Empty.";
						}else{
							if($_POST['img']==''){
									$imgflag=0;
										echo showdata('Question Inserted Successfully.','green',questiondata($_POST));
									}else{
									$imgflag=1;
									
									if($_POST['imgh']==''){
										echo showdata('Enter Question Image Height in Pixels','red','');
										//echo "Enter Question Image Height in Pixels.";
									}else{
										if($_POST['imgw']==''){
											echo showdata('Enter Question Image Width in Pixels','red','');
											//echo "Enter Question Image Width in Pixels.";
										}else{
													/*Create Function and Call*/
													echo showdata('Question Inserted Successfully.','green',questiondata($_POST));
													}
												}
											}
										}
									}
								}
					/*Question Submitter*/
					if($_POST['page']=='answer'){
					if($_POST['action']=='submit'){
					/* Enter Question Function. */
					function questiondata($qdata){
					
					$exam = new myDataBase;
					$exam->data = array(
					$_POST['ques_id'],
					$_POST['math'],
					$_POST['alink'],
					$_POST['img'],
					$_POST['imgh'],
					$_POST['imgw'],
					$exam->date,
					$exam->time
					);
					$exam->query = "
					INSERT INTO ANSWERS(ques_id,textanswer,linkanswer,ans_imgdat,ans_imgh,ans_imgw,date,time) VALUES(?,?,?,?,?,?,?,?)";
					$exam->execute_query();	
					}
					
					function showdata($message='',$color='green',$lastid=''){
					return '<div class="box">
					<div class="box-header with-border">
					<h3 class="box-title">Message</h3>
					<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
					</div>
					<input type="hidden" id="q_last_id" value="'.$lastid.'">
					<div class="box-body"><h2>
					<span style="color:'.$color.'">'.$message.'</span>
					</h2></div><!-- /.box-body -->
					<div class="box-footer">
					Last Input ID : '.$lastid.'
					</div><!-- /.box-footer-->
					</div><!-- /.box -->';
					}
					if($_POST['math']==""){
					echo showdata('ANSWER Field is Empty','red','');
					//echo "Question field is Empty.";
					}else{
					if($_POST['img']==''){
					$imgflag=0;
					echo showdata('ANSWER Inserted Successfully.','green',questiondata($_POST));
					}else{
					$imgflag=1;
					
					if($_POST['imgh']==''){
					echo showdata('Enter ANSWER Image Height in Pixels','red','');
					//echo "Enter Question Image Height in Pixels.";
					}else{
					if($_POST['imgw']==''){
					echo showdata('Enter ANSWER Image Width in Pixels','red','');
					//echo "Enter Question Image Width in Pixels.";
					}else{
					/*Create Function and Call*/
					echo showdata('ANSWER Inserted Successfully.','green',questiondata($_POST));
					}
					}
					}
					}
					}
					}
		
		if($_POST['page']=='edit_question'){
			if($_POST['action']=='fetch_data'){
				$question_id = $_POST['qid'];
				$exam->data = array(
					':qid'=>$question_id
				);
				$exam->query = "
					SELECT * FROM QUESTIONS
					WHERE ques_id= :qid
				";
				$total_row = $exam->total_row();
				$result = $exam->query_result();
				
				$exam->query = "SELECT * FROM ANSWERS
				WHERE ques_id= :qid";
				$total_row2 = $exam->total_row();
				$result2 = $exam->query_result();
				
				if($total_row==1 && $total_row2 == 0){
					echo json_encode($result,JSON_HEX_QUOT | JSON_HEX_TAG);
					}
				else{
					echo json_encode(array_merge($result,$result2),JSON_HEX_QUOT | JSON_HEX_TAG);
				}
				
			}
		}
		
		if($_POST['page']=='edit_question'){
			if($_POST['action']=='update'){
				function showdata2($message='',$color='green',$lastid=''){
					return '<div class="box">
					<div class="box-header with-border">
					<h3 class="box-title">Message</h3>
					<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
					</div>
					<input type="hidden" id="q_last_id" value="'.$lastid.'">
					<div class="box-body"><h2>
					<span style="color:'.$color.'">'.$message.'</span>
					</h2></div><!-- /.box-body -->
					<div class="box-footer">
					Input Updated Question ID : '.$lastid.'
					</div><!-- /.box-footer-->
					</div><!-- /.box -->';
				}
				
				function questiondata2(){
					$exam = new myDataBase;
					$exam->data = array(
							':ques_id'=>$_POST['ques_id'],
							':question'=>$_POST['math'],
							':course_id'=>$_POST['cid'],
							':subject_id'=>$_POST['sid'],
							':chapter_id'=>$_POST['chpid'],
							':ans'=>$_POST['ans'],
							':imagdat'=>$_POST['img'],
							':imgheight'=>$_POST['imgh'],
							':imgwidth'=>$_POST['imgw'],
							':difficulty'=>$_POST['difficult'],
							':priority'=>$_POST['prior'],
							':date'=>$exam->date,
							':time'=>$exam->time
						);
					$exam->query = "
						UPDATE QUESTIONS SET 
							question = :question,
							course_id = :course_id,
							subject_id = :subject_id,
							chapter_id = :chapter_id,
							option_answer = :ans,
							imgdata = :imagdat,
							imgheight = :imgheight,
							imgwidth = :imgwidth,
							difficulty = :difficulty,
							priority = :priority,
							date = :date,
							time = :time
							
							WHERE ques_id = :ques_id
					";
					echo showdata2($exam->execute_query(),'green',$_POST['ques_id']);
				}
				questiondata2();
				//echo showdata2("Data Updated Successfully.",'green',questiondata2);
				function answerdata2(){
				$exam = new myDataBase;
				$exam->data = array(
						':ques_id'=>$_POST['ques_id'],
						':atext'=>$_POST['atext'],
						':alink'=>$_POST['alink'],
						':ans_imgdat'=>$_POST['aimg'],
						':ans_imgh'=>$_POST['aimgh'],
						':ans_imgw'=>$_POST['aimgw'],
						':date'=>$exam->date,
						':time'=>$exam->time
					);
				$exam->query = "
					UPDATE ANSWERS SET 
						textanswer = :atext,
						linkanswer = :alink,
						ans_imgdat = :ans_imgdat,
						ans_imgh = :ans_imgh,
						ans_imgw = :ans_imgw,
						date = :date,
						time = :time
						WHERE ques_id = :ques_id
				";
				echo showdata2($exam->execute_query(),'green',$_POST['ques_id']);
				}
				if($_POST['atext']!=""){
					answerdata2();
				}
			}
		}

/***** FETCH QUESTION LIST [DATATABLE]******/
		if($_POST['page']=='question_list'){
			if($_POST['action']=='fetch'){
			
				$adjacents = 3;
				$targetpage = "QUESTION_LIST.php";
				$limit = 10;
				$page = $_POST['start'];
				
				if($page){ 
					$start = ($page - 1) * $limit; //first item to display on this page
				}else{
					$start = 0;
				}
				if ($page == 0) $page = 1; //if no page var is given, default to 1.
				$prev = $page - 1; //previous page is current page - 1
				$next = $page + 1; //next page is current page + 1
				
				if($_POST['cid']==0 || $_POST['cid']==''){
					$exam->query = "SELECT ques_id FROM QUESTIONS";
					$total = $exam->total_row();
					$exam->query = "SELECT ques_id,question,course_id,subject_id,chapter_id,date,time FROM QUESTIONS LIMIT ".$start.",".$limit;
				}else{
					$exam->data = array(
						":cid"=>$_POST['cid'],
						":sid"=>$_POST['sid'],
						":chpid"=>$_POST['chpid']
					);
					$exam->query = "SELECT ques_id FROM QUESTIONS WHERE course_id=:cid AND subject_id=:sid AND chapter_id=:chpid";
					$total = $exam->total_row();
					$exam->query = "SELECT ques_id,question,course_id,subject_id,chapter_id,date,time FROM QUESTIONS WHERE course_id=:cid AND subject_id=:sid AND chapter_id=:chpid LIMIT ".$start.",".$limit;
				}
				
				$lastpage = ceil($total/$limit); //lastpage.
				$lpm1 = $lastpage - 1; //last page minus 1
				
				$pagination = "";
				if($lastpage > 1)
				{ 
				$pagination .= "<div class='pagination1'> <ul class='pagination'>";
				if ($page > $counter+1) {
				$pagination.= "<li><a href='".$targetpage."?start=".$prev."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>prev</a></li>"; 
				}
				
				if ($lastpage < 7 + ($adjacents * 2)) 
				{ 
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
				if ($counter == $page)
				$pagination.= "<li class='active'><a href='#' class='active'>$counter</a></li>";
				else
				$pagination.= "<li><a href='".$targetpage."?start=".$counter."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$counter."</a></li>"; 
				}
				}
				elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
				{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2)) 
				{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
				if ($counter == $page)
				$pagination.= "<li class='active'><a href='#' class='active'>$counter</a></li>";
				else
				$pagination.= "<li><a href='".$targetpage."?start=".$counter."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$counter."</a></li>"; 
				}
				$pagination.= "<li>...</li>";
				$pagination.= "<li><a href='".$targetpage."?start=".$lpm1."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$lpm1."</a></li>"; 
				$pagination.= "<li><a href='".$targetpage."?start=".$lastpage."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$lastpage."</a></li>";  
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
				$pagination.= "<li><a href='".$targetpage."?start="."1"."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>"."1"."</a></li>"; 
				$pagination.= "<li><a href='".$targetpage."?start="."2"."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>"."2"."</a></li>"; 
				$pagination.= "<li>...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
				if ($counter == $page)
				$pagination.= "<li class='active'><a href='#' class='active'>$counter</a></li>";
				else
				$pagination.= "<li><a href='".$targetpage."?start=".$counter."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$counter."</a></li>";  
				}
				$pagination.= "<li>...</li>";
				$pagination.= "<li><a href='".$targetpage."?start=".$lpm1."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$lpm1."</a></li>"; 
				$pagination.= "<li><a href='".$targetpage."?start=".$lastpage."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$lastpage."</a></li>";  
				}
				//close to end; only hide early pages
				else
				{
				$pagination.= "<li><a href='".$targetpage."?start="."1"."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>"."1"."</a></li>";  
				$pagination.= "<li><a href='".$targetpage."?start="."2"."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>"."2"."</a></li>";  
				$pagination.= "<li>...</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; 
				$counter++)
				{
				if ($counter == $page)
				$pagination.= "<li class='active'><a href='#' class='active'>$counter</a></li>";
				else
				$pagination.= "<li><a href='".$targetpage."?start=".$counter."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>".$counter."</a></li>";  
				}
				}
				}
				
				//next button
				if ($page < $counter - 1) 
				$pagination.= "<li><a href='".$targetpage."?start=".$next."&cid=".$_POST['cid']."&sid=".$_POST['sid']."&cpid=".$_POST['chpid']."'>"."NEXT"."</a></li>";  
				else
				$pagination.= "";
				$pagination.= "</ul></div>\n"; 
				}
				
				//include 'panel/mathjax-script.php';
				$datas = $exam->query_result();
				$showndata = "
					<input type='hidden' id='start' value='".($pn+1)."'>
					<table  id='example1' class='table table-bordered table-striped'>
					<thead>
					<tr>
					<th>Question Id</th>
					<th>Question</th>
					<th>Course Id</th>
					<th>Subject Id</th>
					<th>Chapter Id</th>
					<th>Date Time</th>
					<th>ADD ANSWER</th>
					<th>Edit</th>
					<th>Preview</th>
					</tr>
					</thead>
					<tbody>
					
				";
				foreach($datas as $data){
					$showndata.= "
						<tr>
						<td>".$data['ques_id']."</td>
						<td>".$data['question']."</td>
						<td>".$data['course_id']."</td>
						<td>".$data['subject_id']."</td>
						<td>".$data['chapter_id']."</td>
						<td>".$data['date']." ".$data['time']."</td>
						<td><center><a href='ANSWER_WRITE.php?id=".$data['ques_id']."'><span class='fa fa-database'></span></a></center></td>
						<td><center><a href='edit_question.php?id=".$data['ques_id']."'><span class='fa fa-edit'></span></a></center></td>
						<td><center><a href='QUESTION_PREVIEW.php?qid=".$data['ques_id']."'><span class='fa fa-eye text-warning'></span></a></center></td>
						</tr>
					";
				}
				
				$showndata.= "
					</tbody>
					<tfoot>
					<tr>
					<th>Question Id</th>
					<th>Question</th>
					<th>Course Id</th>
					<th>Subject Id</th>
					<th>Chapter Id</th>
					<th>Date Time</th>
					<th>ADD ANSWER</th>
					<th>Edit</th>
					<th>Preview</th>
					</tr>
					</tfoot>
					</table>
					<script src='https://polyfill.io/v3/polyfill.min.js?features=es6'></script>
					<script id='MathJax-script' async
					src='https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js'>
					</script>
				";
				echo $showndata;
				echo $pagination;
			}
		}
		
		if($_POST['page']=='question_list'){
			if($_POST['action']=='total_questions'){
				$exam->query = "SELECT * FROM questions";
				echo $exam->total_row();
			}
		}
		
/******* FETCH USER LIST ***********/
		if($_POST['page']=='users_list'){
			if($_POST['action']=='fetch'){
				
			}
		}
		
/********** INSERT CHAPTER CODES ***********/
		if($_POST['page']=='chapter'){
			if($_POST['action']=='add_codes'){
				function message($m,$color='green'){
					return '<div class="box">
					<div class="box-header with-border">
					<h3 class="box-title">Message</h3>
					<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div>
					</div>
					<div class="box-body"><h2>
					<span style="color:'.$color.'">'.$m.'</span>
					</h2></div><!-- /.box-body -->
					</div><!-- /.box -->';
				}
				$exam->data = array($_POST['chapterName']);		
				$exam->query = "SELECT * FROM chapter_codes WHERE chapter_name = :chapter_n";
				if($exam->total_row() != 1){
					$exam->data = array(
						'',
						$_POST['chapterName']
					);
					$exam->query = "INSERT INTO chapter_codes(ccode,chapter_name) VALUES (?,?)";
					if($m = $exam->execute_query()){
						echo message($m,'green');
					}
				}else{
					$m = "Chapter Name Already In Database.";
					echo message($m,'red');
				}
			}
		}
		
/******** FETCH CHAPTER CODES LIST **********/
		if($_POST['page']=='chapter'){
			if($_POST['action']=='fetch_data'){
				$exam->query = "SELECT * FROM chapter_codes";
				$datas = $exam->query_result();
				$showndata = "
					<table  id='example1' class='table table-bordered table-striped'>
					<thead>
					<tr>
					<th>Chapter Code</th>
					<th>Chapter Name</th>
					</tr>
					</thead>
					<tbody>
				";
				foreach($datas as $data){
					$showndata.= "
						<tr>
						<td>".$data['ccode']."</td>
						<td>".$data['chapter_name']."</td>
						<!--<td><a href='edit_question.php?id=".$data['ques_id']."'><span class='fa fa-edit'></span></a></td>-->
						</tr>
					";
				}
				
				$showndata.= "
					</tbody>
					<tfoot>
					<tr>
					<th>Chapter Code</th>
					<th>Chapter Name</th>
					</tr>
					</tfoot>
					</table>
						<script type='text/javascript'>
						$(function () {
						//$('#example1').dataTable();
						$('#example1').dataTable({
						'autoWidth':true
						});
						});
						</script>
				";
				
				echo $showndata;
			}
		}
		
		if($_POST['page']=='chapter_exam'){
			if($_POST['action']=='fetch'){
				echo '
					<table  id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th>Exam Id</th>
					<th>Add Questions</th>
					<th>Status</th>
					<th>Chapter Code</th>
					<th>Chapter Name</th>
					<th>No. Of Questions</th>
					<th>Start Date Time</th>
					<th>Duration</th>
					<th>Publish</th>
					<th>Result</th>
					<th>See Questions</th>
					<th>Edit Entity</th>
					<th>Delete Entity</th>
					<th>Enrolled Students</th>
					</tr>
					</thead>
					<tbody id="show">';
					$exam->query = 'SELECT * FROM chapter_exam';
					$res = $exam->query_result();
					foreach($res as $re){
					 echo '<tr>
					<td>1</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					</tr>';
					}
					echo '</tbody>
					<tfoot>
					<tr>
					<th>Exam Id</th>
					<th>Add Questions</th>
					<th>Status</th>
					<th>Chapter Code</th>
					<th>Chapter Name</th>
					<th>No. Of Questions</th>
					<th>Start Date Time</th>
					<th>Duration</th>
					<th>Publish</th>
					<th>Result</th>
					<th>See Questions</th>
					<th>Edit Entity</th>
					<th>Delete Entity</th>
					<th>Enrolled Students</th>
					</tr>
					</tfoot>
					</table>
					<script type="text/javascript">
					$(function () {
					//$("#example1").dataTable();
					$("#example1").dataTable({
					"autoWidth":true
					});
					});
					</script>
				';
			}
		}
	
/***** ADD COURSE *****/
	if($_POST['page']=='add_course'){
		if($_POST['action']=='fetch'){
			echo '
				<table  id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>COURSE ID</th>
				<th>COURSE NAME</th>
				<th>EDIT COURSE NAME</th>
				<th>ADD & VIEW SUBJECTS</th>
				<th>DATE TIME</th>
				<th>DELETE</th>
				</tr>
				</thead>
				<tbody id="show">';
				$exam->query = 'SELECT * FROM COURSE_NAME';
				$res = $exam->query_result();
				foreach($res as $re){
				 echo '<tr>
				<td>'.$re['course_id'].'</td>
				<td>'.$re['course_name'].'</td>
				<td><a href="javascript:void(0)" onclick="editchaptername('.$re['course_id'].')">EDIT NAME</a></td>
				<td><a href="ADD_SUBJECT.php?cid='.$re['course_id'].'"><span class="fa fa-edit"></span></a></td>
				<td>'.$re['date'].' '.$re['time'].'</td>
				<td><a href="javascript:void(0)" onclick="deleteCourse('.$re['course_id'].')"><span class="fa fa-trash text-danger"></span></a></td>
				</tr>';
				}
				echo '</tbody>
				<tfoot>
				<tr>
				<th>COURSE ID</th>
				<th>COURSE NAME</th>
				<th>EDIT COURSE NAME</th>
				<th>ADD & VIEW SUBJECTS</th>
				<th>DATE TIME</th>
				<th>DELETE</th>
				</tr>
				</tfoot>
				</table>
				<script type="text/javascript">
				$(function () {
				//$("#example1").dataTable();
				$("#example1").dataTable({
				"autoWidth":true
				});
				});
				
				function editchaptername(chapterid){
					var id = chapterid;
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"add_course",action:"fetchforupdate",cid:id},
						success:function(data){
							$("#coursename").val(data);
							$("#addCourse").show("slow","linear");
							$("#Createbtn").hide("slow","linear");
							$("#Updatebtn").show("slow","linear");
							$("#cid").show("slow","linear");
							$("#courseid").val(id);
						}
					});
				}
				
				function deleteCourse(chapterid){
					var id = chapterid;
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"add_course",action:"delete",cid:id},
						success:function(data){
							$("#message").html(data);
						}
					});
				}
				
				</script>
			';
		}
	}
		if($_POST['page']=='add_course'){
			if($_POST['action']=='add'){
				$CourseName = $_POST['courseName'];
				//echo '<h3 class="text-success">'.$CourseName.'.</h3>';
				$exam->data = array('',$CourseName,$exam->date,$exam->time);
				$exam->query = "INSERT INTO COURSE_NAME(course_id,course_name,date,time) VALUES(?,?,?,?)";
				$exam->execute_query();
				echo "<h3 class='text-success'>COURSE CREATED SUCCESSFULLY</h3>
						<meta http-equiv='refresh' content='2'>
				";
			}
		}
		
		if($_POST['page']=='add_course'){
			if($_POST['action']=='delete'){
				$CourseId = $_POST['cid'];
				$exam->query = "DELETE FROM COURSE_NAME WHERE course_id=".$CourseId;
				$exam->execute_query();
				echo "<h3 class='text-danger'>COURSE DELETED SUCCESSFULLY</h3>
						<meta http-equiv='refresh' content='2'>
				";
			}
		}
		
		if($_POST['page']=='add_course'){
			if($_POST['action']=='fetchforupdate'){
				$exam->query = "SELECT * FROM COURSE_NAME WHERE course_id=".$_POST['cid'];
				$result = $exam->query_result();
				echo $result[0][1];
			}
		}
		
		if($_POST['page']=='add_course'){
			if($_POST['action']=='update'){
				$exam->query = "UPDATE COURSE_NAME set course_name='".$_POST['courseName']."' WHERE course_id=".$_POST['courseId'];
				$exam->execute_query();
				echo "<h3>COURSE NAME UPDATED SUCCESSFULY</h3>
				<meta http-equiv='refresh' content='2'>";
			}
		}
		
/***** ADD SUBUECT *****/
		if($_POST['page']=='add_subject'){
		if($_POST['action']=='fetch'){
		echo '
		<table  id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>SUBJECT ID</th>
		<th>SUBJECT NAME</th>
		<th>EDIT SUBJECT NAME</th>
		<th>ADD & VIEW CHPATERS</th>
		<th>DATE TIME</th>
		<th>DELETE</th>
		</tr>
		</thead>
		<tbody id="show">';
		$exam->query = 'SELECT * FROM SUBJECTS_NAME WHERE course_id='.$_POST['courseid'];
		$res = $exam->query_result();
		foreach($res as $re){
		echo '<tr>
		<td>'.$re['subject_id'].'</td>
		<td>'.$re['subject_name'].'</td>
		<td><a href="javascript:void(0)" onclick="editchaptername('.$re['subject_id'].')">EDIT NAME</a></td>
		<td><a href="ADD_CHAPTER.php?sid='.$re['subject_id'].'"><span class="fa fa-edit"></span></a></td>
		<td>'.$re['date'].' '.$re['time'].'</td>
		<td><a href="javascript:void(0)" onclick="deleteCourse('.$re['subject_id'].')"><span class="fa fa-trash text-danger"></span></a></td>
		</tr>';
		}
		echo '</tbody>
		<tfoot>
		<tr>
		<th>SUBJECT ID</th>
		<th>SUBJECT NAME</th>
		<th>EDIT SUBJECT NAME</th>
		<th>ADD & VIEW CHAPTERS</th>
		<th>DATE TIME</th>
		<th>DELETE</th>
		</tr>
		</tfoot>
		</table>
		<script type="text/javascript">
		$(function () {
		//$("#example1").dataTable();
		$("#example1").dataTable({
		"autoWidth":true
		});
		});
		
		function editchaptername(chapterid){
		var id = chapterid;
		$.ajax({
		url:"../ajax.php",
		type:"POST",
		data:{page:"add_subject",action:"fetchforupdate",sid:id},
		success:function(data){
		$("#subjectname").val(data);
		$("#addSubject").show("slow","linear");
		$("#Createbtn").hide("slow","linear");
		$("#Updatebtn").show("slow","linear");
		$("#cid").show("slow","linear");
		$("#subjectid").val(id);
		}
		});
		}
		
		function deleteCourse(chapterid){
			var id = chapterid;
			$.ajax({
				url:"../ajax.php",
				type:"POST",
				data:{page:"add_subject",action:"delete",sid:id},
				success:function(data){
					$("#message").html(data);
				}
			});
		}
		
		
		</script>
		';
		}
		}
		
		if($_POST['page']=='add_subject'){
		if($_POST['action']=='add'){
		$SubjectName = $_POST['subjectname'];
		$CourseId = $_POST['courseid'];
		//echo '<h3 class="text-success">'.$CourseName.'.</h3>';
		$exam->data = array('',$CourseId,$SubjectName,$exam->date,$exam->time);
		$exam->query = "INSERT INTO SUBJECTS_NAME(subject_id,course_id,subject_name,date,time) VALUES(?,?,?,?,?)";
		$exam->execute_query();
		echo "<h3 class='text-success'>SUBUECT ADDED SUCCESSFULLY</h3>
			<meta http-equiv='refresh' content='2'>
		";
		}
		}
		
		if($_POST['page']=='add_subject'){
			if($_POST['action']=='delete'){
				$SubjectId = $_POST['sid'];
				$exam->query = "DELETE FROM SUBJECTS_NAME WHERE subject_id=".$SubjectId;
				$exam->execute_query();
				echo "<h3 class='text-danger'>SUBIECT DELETED SUCCESSFULLY</h3>
					<meta http-equiv='refresh' content='2'>
				";
			}
		}
		
		if($_POST['page']=='add_subject'){
		if($_POST['action']=='fetchforupdate'){
		$exam->query = "SELECT * FROM SUBJECTS_NAME WHERE subject_id=".$_POST['sid'];
		$result = $exam->query_result();
		echo $result[0][2];
		}
		}
		
		if($_POST['page']=='add_subject'){
		if($_POST['action']=='update'){
		$exam->query = "UPDATE SUBJECTS_NAME set subject_name='".$_POST['subjectName']."' WHERE subject_id=".$_POST['subjectId'];
		$exam->execute_query();
		echo "<h3 class='text-success'>SUBJECT NAME UPDATED SUCCESSFULY</h3>
		<meta http-equiv='refresh' content='2'>";
		}
		}

/***** ADD CHAPTER *****/
		if($_POST['page']=='add_chapter'){
		if($_POST['action']=='fetch'){
		echo '
		<table  id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>CHAPTER ID</th>
		<th>CHAPTER NAME</th>
		<th>EDIT CHAPTER NAME</th>
		<th>DATE TIME</th>
		<th>DELETE</th>
		</tr>
		</thead>
		<tbody id="show">';
		$exam->query = 'SELECT * FROM CHAPTER_NAME WHERE SUBJECT_ID='.$_POST['subjectid'];
		$res = $exam->query_result();
		foreach($res as $re){
		echo '<tr>
		<td>'.$re['CHAPTER_ID'].'</td>
		<td>'.$re['CHAPTER_NAME'].'</td>
		<td><a href="javascript:void(0)" onclick="editchaptername('.$re['CHAPTER_ID'].')">EDIT NAME</a></td>
		<td>'.$re['DATE'].' '.$re['TIME'].'</td>
		<td><a href="javascript:void(0)" onclick="deleteCourse('.$re['CHAPTER_ID'].')"><span class="fa fa-trash text-danger"></span></a></td>
		</tr>';
		}
		echo '</tbody>
		<tfoot>
		<tr>
		<th>CHAPTER ID</th>
		<th>CHAPTER NAME</th>
		<th>EDIT CHAPTER NAME</th>
		<th>DATE TIME</th>
		<th>DELETE</th>
		</tr>
		</tfoot>
		</table>
		<script type="text/javascript">
		
		$(function () {
		//$("#example1").dataTable();
		$("#example1").dataTable({
		"autoWidth":true
		});
		});
		
		function editchaptername(chapterid){
		var id = chapterid;
		$.ajax({
		url:"../ajax.php",
		type:"POST",
		data:{page:"add_chapter",action:"fetchforupdate",sid:id},
		success:function(data){
		$("#chaptername").val(data);
		$("#addChapter").show("slow","linear");
		$("#Createbtn").hide("slow","linear");
		$("#Updatebtn").show("slow","linear");
		$("#cid").show("slow","linear");
		$("#chapterid").val(id);
		}
		});
		}
		
		function deleteCourse(chapterid){
			var id = chapterid;
			$.ajax({
				url:"../ajax.php",
				type:"POST",
				data:{page:"add_chapter",action:"delete",sid:id},
				success:function(data){
					$("#message").show("slow","linear");
					$("#message").html(data);
				}
			});
		}
		
		
		</script>
		';
		}
		}
		
		if($_POST['page']=='add_chapter'){
		if($_POST['action']=='add'){
		$chapterName = $_POST['chaptername'];
		$subjectId = $_POST['subjectid'];
		
		//echo '<h3 class="text-success">'.$CourseName.'.</h3>';
		$exam->data = array('',$subjectId,$chapterName,$exam->date,$exam->time);
		$exam->query = "INSERT INTO CHAPTER_NAME(CHAPTER_ID,SUBJECT_ID,CHAPTER_NAME,DATE,TIME) VALUES(?,?,?,?,?)";
	    $exam->execute_query();
		echo "<h3 class='text-success'>CHAPTER ADDED SUCCESSFULLY</h3>
			<meta http-equiv='refresh' content='2'>
		";
		}
		}
		
		if($_POST['page']=='add_chapter'){
			if($_POST['action']=='delete'){
				$ChapterId = $_POST['sid'];
				$exam->query = "DELETE FROM CHAPTER_NAME WHERE CHAPTER_ID=".$ChapterId;
				$exam->execute_query();
				echo "<h3 class='text-danger'>CHAPTER DELETED SUCCESSFULLY</h3>
					<meta http-equiv='refresh' content='2'>
				";
			}
		}
		
		if($_POST['page']=='add_chapter'){
		if($_POST['action']=='fetchforupdate'){
		$exam->query = "SELECT * FROM CHAPTER_NAME WHERE CHAPTER_ID=".$_POST['sid'];
		$result = $exam->query_result();
		echo $result[0][2];
		}
		}
		
		if($_POST['page']=='add_chapter'){
		if($_POST['action']=='update'){
		$exam->query = "UPDATE CHAPTER_NAME set CHAPTER_NAME='".$_POST['chapterName']."' WHERE CHAPTER_ID=".$_POST['chapterId'];
		$exam->execute_query();
		echo "<h3 class='text-success'>CHAPTER NAME UPDATED SUCCESSFULY</h3>
		<meta http-equiv='refresh' content='2'>";
		}
		}

/***** QUESTION BANK ******/
	if($_POST['page']=='question_bank'){
		if($_POST['action']=='course_fetch'){
			$exam->query = "SELECT * FROM COURSE_NAME";
			$datas = $exam->query_result();
			$showndata = "
				<table  id='example1' class='table table-bordered table-striped'>
				<thead>
				<tr>
				<th>Course Id</th>
				<th>Course Name</th>
				<th>Select Subject</th>
				<th>Select Chapter</th>
				<th>ADD QUESTIONS</th>
				<th>LIST QUESTIONS</th>
				</tr>
				</thead>
				<tbody>
			";
			$i=1;
			foreach($datas as $dat){
				$exam->query = "SELECT * FROM SUBJECTS_NAME WHERE course_id=".$dat['course_id'];
				$results = $exam->query_result();
				$showndata.= "
					<tr>
					<td>".$dat['course_id']."</td>
					<td>".$dat['course_name']."</td>
					<td>
						<select class='form-control' id='subjectSelect".$i."'>
						<option value='0' selected>None</option>
						";
						
						foreach($results as $result){
							$showndata.= "<option value='".$result['subject_id']."'>".$result['subject_name']."</option>";
						}
							
				$showndata .= "</select>
					</td>
					<td>
					<span id='chapterSelectForm".$i."'>
					";
						
				$showndata .= "</span>
					<script>
						$('#subjectSelect".$i."').on('change',function(){
						var subid = $('#subjectSelect".$i."').val();
						$.ajax({
						url:'../ajax.php',
						type:'POST',
						data:{page:'question_bank',action:'chaptersfetchbysid',subjectid:subid,num:".$i."},
						success:function(dat){
							$('#chapterSelectForm".$i."').html(dat);
						}
						});
						});
					</script>
				</td>
					<input type='hidden' value='".$dat['course_id']."' id='courseid".$i."'>
					<input type='hidden' id='subjectid".$i."'>
					<input type='hidden' id='chapterid".$i."'>
					<script>
						$('#subjectSelect".$i."').on('change',function(){
							$('#subjectid".$i."').val($('#subjectSelect".$i."').val());
							
						});
					</script>
					<td><a href='javascript:void(0)' id='linkclick".$i."' onclick='addQuestion(".$i.")'><span class='fa fa-edit'></span></a>
					<td><a href='javascript:void(0)' id='linklistclick".$i."' onclick='listQuestion(".$i.")'><span class='fa fa-list'></span></a>
						<script>
							$('#linkclick".$i."').hide();
							$('#linklistclick".$i."').hide();
							function addQuestion(num){
								couid = $('#courseid'+num).val();
								subid = $('#subjectid'+num).val();
								chpid = $('#chapterid'+num).val();
								if(subid==0 && chpid == 0){
									alert('SELECTING SUBJECT OR CHAPTER IS MISSING.');
								}else{
								window.location.href='QUESTION_WRITE.php?cid='+couid+'&sid='+subid+'&cpid='+chpid;
								}
							}
							
							function listQuestion(num){
								couid = $('#courseid'+num).val();
								subid = $('#subjectid'+num).val();
								chpid = $('#chapterid'+num).val();
								if(subid==0 && chpid == 0){
									alert('SELECTING SUBJECT OR CHAPTER IS MISSING.');
								}else{
								window.location.href='QUESTION_LIST.php?cid='+couid+'&sid='+subid+'&cpid='+chpid;
								}
							}
							
						</script>
					</td>
					</tr>
				";
				$i++;
			}
			
			$showndata.= "
				</tbody>
				<tfoot>
				<tr>
				<th>Course Id</th>
				<th>Course Name</th>
				<th>Select Subject</th>
				<th>Select Chapter</th>
				<th>ADD QUESTION</th>
				</tr>
				</tfoot>
				</table>
					<script type='text/javascript'>
					$(function () {
					//$('#example1').dataTable();
					$('#example1').dataTable({
					'autoWidth':true
					});
					});
					
					</script>
					
			";
			
			echo $showndata;
		}
	}
	
	if($_POST['page']=='question_bank'){
		if($_POST['action']=='chaptersfetchbysid'){
			$SubjectId = $_POST['subjectid'];
			$exam->query = "SELECT * FROM CHAPTER_NAME WHERE SUBJECT_ID=".$SubjectId;
			$results = $exam->query_result();
			
			echo "<select class='form-control' id='chapterSelect".$_POST['num']."'>
				<option value='0'>NONE</option>
			";
				foreach($results as $result){
					echo "<option value='".$result['CHAPTER_ID']."'>".$result['CHAPTER_NAME']."</option>";
				}
			echo "</select>
				<script>
				
				$('#chapterSelect".$_POST['num']."').on('change',function(){
					
					$('#chapterid".$_POST['num']."').val($('#chapterSelect".$_POST['num']."').val());
					$('#linkclick".$_POST['num']."').show('slow','linear');
					$('#linklistclick".$_POST['num']."').show('slow','linear');
				});
				</script>
			";
		}
	}
		if($_POST['page']=='exam'){
			if($_POST['action']=='createAIR'){
				if($_POST['EType']==1){
				$exam->query = "SELECT * FROM COURSE_NAME";
				$datas = $exam->query_result();
				$showndata = "
				<table  id='example1' class='table table-bordered table-striped'>
				<thead>
				<tr>
				<th>Course Id</th>
				<th>Course Name</th>
				<th>Select Subject</th>
				<th>Select Chapter</th>
				<th>SHOW FORM</th>
				</tr>
				</thead>
				<tbody>
				";
				$i=1;
				foreach($datas as $dat){
				$exam->query = "SELECT * FROM SUBJECTS_NAME WHERE course_id=".$dat['course_id'];
				$results = $exam->query_result();
				$showndata.= "
				<tr>
				<td>".$dat['course_id']."</td>
				<td>".$dat['course_name']."</td>
				<td>
				<select class='form-control' id='subjectSelect".$i."'>
				<option value='0' selected>None</option>
				";
				
				foreach($results as $result){
				$showndata.= "<option value='".$result['subject_id']."'>".$result['subject_name']."</option>";
				}
				
				$showndata .= "</select>
				</td>
				<td>
				<span id='chapterSelectForm".$i."'>
				";
				
				$showndata .= "</span>
				<script>
				$('#subjectSelect".$i."').on('change',function(){
				var subid = $('#subjectSelect".$i."').val();
				$.ajax({
				url:'../ajax.php',
				type:'POST',
				data:{page:'exam',action:'create',subjectid:subid,num:".$i."},
				success:function(dat){
				$('#chapterSelectForm".$i."').html(dat);
				}
				});
				});
				</script>
				</td>
				<input type='hidden' value='".$dat['course_id']."' id='courseid".$i."'>
				<input type='hidden' id='subjectid".$i."'>
				<input type='hidden' id='chapterid".$i."'>
				<script>
				$('#subjectSelect".$i."').on('change',function(){
				$('#subjectid".$i."').val($('#subjectSelect".$i."').val());
				
				});
				</script>
				<td><a href='javascript:void(0)' id='linkclick".$i."' onclick='addQuestion(".$i.")'><span class='fa fa-eye text-warning'></span></a>
				<script>
				$('#linkclick".$i."').hide();
				function addQuestion(num){
				couid = $('#courseid'+num).val();
				subid = $('#subjectid'+num).val();
				chpid = $('#chapterid'+num).val();
				if(subid==0 && chpid == 0){
				alert('SELECTING SUBJECT OR CHAPTER IS MISSING.');
				}else{
					$('#contentAjax').hide('slow','linear');
					$('#AssignmentForm').show('slow','linear');
					$('#courseid').val(couid);
					$('#subjectid').val(subid);
					$('#chapterid').val(chpid);
					$('#examtype').val(".$_POST['EType'].")
					
				}
				}
				</script>
				</td>
				</tr>
				";
				$i++;
				}
				
				$showndata.= "
				</tbody>
				<tfoot>
				<tr>
				<th>Course Id</th>
				<th>Course Name</th>
				<th>Select Subject</th>
				<th>Select Chapter</th>
				<th>SHOW FORM</th>
				</tr>
				</tfoot>
				</table>
				<script type='text/javascript'>
				$(function () {
				//$('#example1').dataTable();
				$('#example1').dataTable({
				'autoWidth':true
				});
				});
				
				</script>
				
				";
				
				}
				
				echo $showndata;
			}
		}
		
		if($_POST['page']=='exam'){
		if($_POST['action']=='create'){
		$SubjectId = $_POST['subjectid'];
		$exam->query = "SELECT * FROM CHAPTER_NAME WHERE SUBJECT_ID=".$SubjectId;
		$results = $exam->query_result();
		
		echo "<select class='form-control' id='chapterSelect".$_POST['num']."'>
		<option value='0'>NONE</option>
		";
		foreach($results as $result){
		echo "<option value='".$result['CHAPTER_ID']."'>".$result['CHAPTER_NAME']."</option>";
		}
		echo "</select>
		<script>
		
		$('#chapterSelect".$_POST['num']."').on('change',function(){
			$('#chapterid".$_POST['num']."').val($('#chapterSelect".$_POST['num']."').val());
			$('#linkclick".$_POST['num']."').show('slow','linear');
		});
		</script>
		";
		}
		}
		
		if($_POST['page']=='exam'){
			if($_POST['action']=='selectfromdatabase'){
				$exam->query = "SELECT ques_id,question,course_id,subject_id,chapter_id,date,time FROM QUESTIONS WHERE course_id=".$_POST['courseId']." AND subject_id=".$_POST['subjectId']." AND chapter_id=".$_POST['chapterId'];
				$datas = $exam->query_result();
				$showndata = "
					<table  id='example2' class='table table-bordered table-striped'>
					<thead>
					<tr>
					<input type='hidden' id='checkboxlength' placeholder='checkbox length'>
					<th>SELECT</th>
					<th>Question Id</th>
					<th>Question</th>
					<th>Course Id</th>
					<th>Subject Id</th>
					<th>Chapter Id</th>
					<th>Date Time</th>
					<th>Edit</th>
					<th>Preview</th>
					</tr>
					</thead>
					<tbody>
				";
				foreach($datas as $data){
					$showndata.= "
						<tr>
						<td><input name='selector[]' id='checkQues' class='selectedQues' type='checkbox' value='".$data['ques_id']."' ></td>
						<td>".$data['ques_id']."</td>
						<td>".$data['question']."</td>
						<td>".$data['course_id']."</td>
						<td>".$data['subject_id']."</td>
						<td>".$data['chapter_id']."</td>
						<td>".$data['date']." ".$data['time']."</td>
						<td><a href='edit_question.php?id=".$data['ques_id']."'><span class='fa fa-edit'></span></a></td>
						<td><a href='QUESTION_PREVIEW.php?qid=".$data['ques_id']."'><span class='fa fa-eye text-warning'></span></a></td>
						</tr>
					";
				}
				
				$showndata.= "
					</tbody>
					<tfoot>
					<tr>
					<th>SELECT</th>
					<th>Question Id</th>
					<th>Question</th>
					<th>Course Id</th>
					<th>Subject Id</th>
					<th>Chapter Id</th>
					<th>Date Time</th>
					<th>Edit</th>
					<th>Preview</th>
					</tr>
					</tfoot>
					</table>
					<script src='https://polyfill.io/v3/polyfill.min.js?features=es6'></script>
					<script id='MathJax-script' async
					src='https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js'>
					</script>
						<script type='text/javascript'>
						$(function () {
						//$('#example1').dataTable();
						$('#example2').dataTable({
						'autoWidth':true
						});
						});
						$('.selectedQues').on('change',function(){
							$('#checkboxlength').val($('.selectedQues:checked').length);
							if($('.selectedQues:checked').length == ".$_POST['totalQuestions']."){
								$('.selectedQues').hide('slow','linear');
							}
							
						});
						</script>
						
				";
				
				echo $showndata;
			}
		}
		if($_POST['page']=='exam'){
			if($_POST['action']=='createAssignment'){
				//var_dump($_POST);
				extract($_POST);
				
				function QuestionIdGenerator(int $limit){
					$exam = new myDataBase();
					$exam->query = "SELECT ques_id FROM QUESTIONS ORDER BY RAND() LIMIT ".$limit;
					$result = $exam->query_result();
					foreach($result as $r){
						$k[] = $r['ques_id'];
					}
					return $k;
				}
				
				function checkQuestion(array $checkq,int $qid){
					return in_array($qid,$checkq);
				}	
				
				function ActualGeneration(array $generat=[], array $quesid,int $totalQuestions){
					$GeneratedQuestions = $generat;
					$l = $totalQuestions;
					while (TRUE){
							$ids = QuestionIdGenerator($totalQuestions);
							
							$beforeCOUNTgeneratedQ = count($GeneratedQuestions);
							foreach($ids as $id){
								if(!checkQuestion($quesid,$id)){
									if(!checkQuestion($GeneratedQuestions,$id)){
										$GeneratedQuestions[] = $id;
										$l = $totalQuestions - ($c = count($GeneratedQuestions));	
									}
									$afterCOUNTgeneratedQ = count($GeneratedQuestions);
									if($l<=0){
										break 2;
									}
								}
							}
						}
						return ($GeneratedQuestions);
					}
							
				
					$autoselect = 1;
				if($selectfromdb == 1){
					$autoselect = 0;
				}
				
				if($autoselect == 1){
				
					$exam->query = "SELECT QUESTIONS_IDS FROM EXAM_AIR_DETAILS WHERE type=".$examType;
					$allqids = $exam->query_result();
					if(!empty($allqids)){
						foreach($allqids as $allqid){
							$qids[] = explode("/",$allqid['QUESTIONS_IDS']);
						}
						foreach($qids as $qid){
							$ques_id[] = $qid;
						}
						foreach($ques_id as $id){
							foreach($id as $question){
								$quesid[] = $question;
							}
						}
					}else{
						$quesid = [];
					}

								
						$stringQuestion = join("/",ActualGeneration([],$quesid,$totalQuestions));
						
				}
				
				if($autoselect == 0){
					$alreadySELECTEDlength = $checkboxlen;
					$alreadySELECTEDqids = $checkedQIDS;
					//$totalQuestions = $totalQuestions - $checkboxlen;
					
					$exam->query = "SELECT QUESTIONS_IDS FROM EXAM_AIR_DETAILS WHERE type=".$examType;
					$allqids = $exam->query_result();
					foreach($allqids as $allqid){
						$qids[] = explode("/",$allqid['QUESTIONS_IDS']);
					}
					foreach($qids as $qid){
						$ques_id[] = $qid;
					}
					foreach($ques_id as $id){
						foreach($id as $question){
							$quesid[] = $question;
						}
					}
					if($alreadySELECTEDlength != $totalQuestions){			
							$stringQuestion = join("/",ActualGeneration($alreadySELECTEDqids,$quesid,$totalQuestions));
						}else{
							$stringQuestion = join("/",$alreadySELECTEDqids);
						}
				}	//var_dump($stringQuestion);
				
				$stringQuestion;
				
				$exam->data = [
					'',
					$examName,
					$examType,
					$courseId,
					$subjectId,
					$chapterId,
					$start_date,
					$start_time,
					$dur,
					$exam->date,
					$exam->time,
					$totalQuestions,
					rand(1,5),
					$selectfromdb,
					0,
					0
				];
				$exam->query = "INSERT INTO EXAM_AIR(EXAM_ID,EXAM_NAME,EXAM_TYPE,COURSE_ID,SUBJECT_ID,CHAPTER_ID,START_DATE,START_TIME,DURATION,CREATE_DATE,CREATE_TIME,NUMBER_OF_QUESTIONS,NUMBER_OF_DIFF_QUESTIONS,SELECT_FROM_DB,STATUS,ADD_WITH_AI) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				echo $exam->execute_query();
				$lastExamId = $exam->lastId();
				$exam->data = [
					$lastExamId,
					$examType,
					$stringQuestion,
					$markright,
					$markwrong
				];
				$exam->query = "INSERT INTO EXAM_AIR_DETAILS(EXAM_ID,type,QUESTIONS_IDS,RIGHT_MARK,WRONG_MARK) VALUES (?,?,?,?,?)";
				echo $exam->execute_query();
			}
		}
		
		if($_POST['page']=='searchques'){
			if($_POST['action']=='search'){
				extract($_POST);
				if(isset($id)){
					$exam->query = "SELECT ques_id,question,course_id,subject_id,chapter_id,date,time FROM QUESTIONS WHERE ques_id=".$id;
				}
				if(isset($questex)){
					$exam->query = "SELECT ques_id,question,course_id,subject_id,chapter_id,date,time FROM QUESTIONS WHERE question LIKE '%".$questex."%'";
				}
				//echo $exam->query;
				//echo $exam->execute_query();
				$row = $exam->total_row();
				$total = $row;
				if($row){
				$datas = $exam->query_result();
				$showndata = "<table  id='example1' class='table table-bordered table-striped'>
				<thead>
				<tr>
				<th>Question Id</th>
				<th>Question</th>
				<th>Course Id</th>
				<th>Subject Id</th>
				<th>Chapter Id</th>
				<th>Date Time</th>
				<th>ADD ANSWER</th>
				<th>Edit</th>
				<th>Preview</th>
				</tr>
				</thead>
				<tbody>
				";
				foreach($datas as $data){
				$showndata.= "
				<tr>
				<td>".$data['ques_id']."</td>
				<td>".$data['question']."</td>
				<td>".$data['course_id']."</td>
				<td>".$data['subject_id']."</td>
				<td>".$data['chapter_id']."</td>
				<td>".$data['date']." ".$data['time']."</td>
				<td><center><a href='ANSWER_WRITE.php?id=".$data['ques_id']."'><span class='fa fa-database'></span></a></center></td>
				<td><center><a href='edit_question.php?id=".$data['ques_id']."'><span class='fa fa-edit'></span></a></center></td>
				<td><center><a href='QUESTION_PREVIEW.php?qid=".$data['ques_id']."'><span class='fa fa-eye text-warning'></span></a></center></td>
				</tr>
				";
				}
				$showndata.= "
				</tbody>
				<tfoot>
				<tr>
				<th>Question Id</th>
				<th>Question</th>
				<th>Course Id</th>
				<th>Subject Id</th>
				<th>Chapter Id</th>
				<th>Date Time</th>
				<th>Edit</th>
				<th>Preview</th>
				</tr>
				</tfoot>
				</table>
				<script type='text/javascript'>
				$(function () {
				//$('#example1').dataTable();
				$('#example1').dataTable({
				'autoWidth':true
				});
				});
				</script>
				<script src='https://polyfill.io/v3/polyfill.min.js?features=es6'></script>
				<script id='MathJax-script' async
				src='https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js'>
				</script>
				";
				
				echo $showndata;
				}else{
					echo "Question ID : ".$id." | NOT FOUND.";
				}
				
			}
		}
		
		
/*********** EXAM GIVER CHECK VIEW PAGE *************/

	if($_POST['page']=='examgiver'){
		if($_POST['action']=='checkview'){
		//var_dump($_POST);
			session_start();
			if(!isset($_SESSION['keyAnswerVal'])){
				$_SESSION['keyAnswerVal']=[];
			}
			//var_dump($_SESSION['savestatekey']);
			//var_dump($_SESSION['keyAnswerVal']);
			$AnswerQKey = [];
			$AnswerQAns = [];
			foreach($_SESSION['keyAnswerVal'] as $keyAnsVal){
				$arr = explode("@",$keyAnsVal);
			    array_push($AnswerQKey,$arr[0]);
				array_push($AnswerQAns,$arr[1]);
			}
			extract($_POST);
			$exam->data = [
				':eid'=>$examId
			];
			$exam->query = "SELECT * FROM EXAM_AIR INNER JOIN EXAM_AIR_DETAILS ON EXAM_AIR.EXAM_ID=EXAM_AIR_DETAILS.EXAM_ID WHERE EXAM_AIR.EXAM_ID=:eid";
			$result = $exam->query_result();
			if(!isset($_SESSION['examSeconds'])){
				$_SESSION['examSeconds']=($result[0]['DURATION'] * 60);
			}
			$qid_array = explode("/",$result[0]['QUESTIONS_IDS']);
			$lambda = isset($_POST['quesSHOWid']) ? $_POST['quesSHOWid'] : 0;
			//echo "Lambda : ".$lambda;
			$finalAns = [];
			$j=0;
			foreach($AnswerQKey as $key){
				array_push($finalAns,$qid_array[$key]."/".$AnswerQAns[$j]);
				$j++;
			}
			$_SESSION['finalAns'] = $finalAns;
			//var_dump($_SESSION['finalAns']);
			$exam->data = [":qid"=>$qid_array[($lambda)]];
			$exam->query = "SELECT question,optiona,optionb,optionc,optiond,imgdata,imgheight,imgwidth FROM QUESTIONS WHERE ques_id = :qid";
			$questionshowresult = $exam->query_result();
			//var_dump($questionshowresult);
			extract($questionshowresult[0]);
			echo "<div id='exam_timer' data-timer=".$_SESSION['examSeconds']." style='max-width:400px; width: 100%; height: 70px;'> Exam Timer : </div><br>";
			echo "<div id='current_q_timer' style='max-width:400px; width: 100%; height: 70px;'> Time Spent : </div>";
			echo "<div class='row'>
			<div class='col-md-8'>
			<div class='card'>
			<div class='card-header'></div>
			<div class='card-body'>
			<div id='single_question_area'><br>
			<h4>Question ".($quesSHOWid+1)." : </h4>
			<!-- Show Question Here -->
			<h4 style='width:auto;overflow:scroll'>
			".$question."
			</h4>
			<hr />
			<img src='".$imgdata."' 
			style='height:".$imgheight."px;width:".$imgwidth ."px'\><br>
			<hr />
			<div class='row'>
			<div class='col-md-6' style='margin-bottom:32px;'>
			<div class='radio'>
			<h3>Select Answer : </h3><br>
			<!-- Show Options Here -->
			<label class='cont'>
			<input type='radio' class='check' value='1' id='option1' name='option'>
			<span class='checkmark'></span> &nbsp;&nbsp;".$optiona."
			</label>
			<label class='cont'>
			<input type='radio' class='check' id='option2' value='2' name='option'>
			<span class='checkmark'></span> &nbsp;&nbsp;".$optionb."
			</label>
			<label class='cont'>
			<input type='radio' class='check' value='3' id='option3' name='option'>
			<span class='checkmark'></span> &nbsp;&nbsp;".$optionc."
			</label>
			<label class='cont'>
			<input type='radio' class='check' value='4' id='option4' name='option'>
			<span class='checkmark'></span> &nbsp;&nbsp;". $optiond."
			</label>
			<script src=\"https://polyfill.io/v3/polyfill.min.js?features=es6\"></script>
			<script id=\"MathJax-script\" async
			src=\"https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js\">
			</script>
			</div>
			</div>
			</div>
			
			<br /><br />
			<div align='center'>
			<button type='button' name='previous' class='btn btn-info' id='previous' onclick='prev(".$quesSHOWid.")'>Previous</button>
			<button type='button' name='next' class='btn btn-info'  onclick='next(".$quesSHOWid.")' id='next'> NEXT</button>
			<br><br>
			<button type='button' name='saveandnext' class='btn btn-success'  onclick='saveandnext(".$quesSHOWid.")' id='sandnext'> SAVE and NEXT</button>
			<button type='button' name='bookmark' class='btn btn-danger' onclick='bookmark(".$quesSHOWid.")' id='bookmark'>Bookmark and Next</button><br><br>
			<button type='button' name='submit' class='btn btn-success' id=''>Submit</button>
			</div>
			<br /><br />
			</div>
			</div>
			</div>
			<br />
			";
			
			$showQDemo = '
			
			<script>
				$(function () {
				/* For demo purposes */
				var demo = $("<div />").css({
				position: "fixed",
				top: "50px",
				right: "0",
				background: "#fff",
				"border-radius": "5px 0px 0px 5px",
				padding: "10px 15px",
				"font-size": "16px",
				"z-index": "99999",
				cursor: "pointer",
				color: "#3c8dbc",
				"box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
				}).html("<i class=\'fa fa-list\'></i>").addClass("no-print");
				
				var demo_settings = $("<div/>").css({
				"padding": "10px",
				position: "fixed",
				top: "50px",
				right: "-250px",
				background: "#fff",
				border: "0px solid #ddd",
				height:"500px",
				overflow:"auto",
				"width": "250px",
				"z-index": "99999",
				"box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
				}).addClass("no-print");
				demo_settings.append(
				"<h4 class=\'text-light-blue\' style=\'margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;\'>QUESTION NAVIGATION</h4>"
				
				+ "<div style=\'\'><ul class=\'pagination\'>"
				
				';
				
				$i=0;
				foreach($qid_array as $qid){
					$class = ($i==$quesSHOWid) ? 'active' : '';
					$style = (@in_array($i,$_SESSION['savestatekey'])) ? "style=\\'background-color:green; color:#fff;\\'" : '';
					$style2= (@in_array($i,$_SESSION['bookmark'])) ? "style=\\'background-color:purple; color:#fff;\\'" : '';
					$showQDemo .= '+ "<li class='.$class.'><a href=\'javascript:void(0)\' '.$style.' '.$style2.' onclick=\'callQ('.($i).')\'>'.($i+1)." ".'</a></li>"';
				$i++;
				}
				
				if(in_array($quesSHOWid,$AnswerQKey)){
					$KEY = array_search($quesSHOWod,$AnswerQKey);
					$KEYAns = $AnswerQAns[$KEY];
					echo "<script>
						$('#option".$KEYAns."').attr('checked',true);
					</script>";
				}
				
				
				$showQDemo .= ' + "</ul></div>" ); demo.click(function () {
				if (!$(this).hasClass("open")) {
				$(this).animate({"right": "250px"});
				demo_settings.animate({"right": "0"});
				$(this).addClass("open");
				} else {
				$(this).animate({"right": "0"});
				demo_settings.animate({"right": "-250px"});
				$(this).removeClass("open");
				}
				});
				
				$("body").append(demo);
				$("body").append(demo_settings);
				
				});
				
				function callQ(id){
					window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+id;
				}
				
				$("#exam_timer").TimeCircles({ 
				"circle_bg_color": "#90989F",
				time:{
				Days:{
				show: false
				},
				Hours:{
				show: true
				}
				}
				});
				
				$("#current_q_timer").TimeCircles({ 
				animation:"smooth",
				bg_width:0.5,
				fg_width:0.03666666667,
				"circle_bg_color": "#90989F",
				time:{
					Days:{
						show: false
					},
				Hours:{
						show: false
					},
				Seconds:{
					show:true,
					color:"#40484F"
				}
				}
				});
				
				
				function saveandnext(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
						}
					});
					answerval = $(\'input[name="option"]:checked\').val()
					$.ajax({
						url:\'../ajax.php\',
						type:\'POST\',
						data:{page:\'examgiver\',action:\'savestate\',key:key,answervalue:answerval},
						success:function(sata){
							window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key+1);
						}
					});
				}
				
				function saveandnext2(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
						}
					});
					answerval = $(\'input[name="option"]:checked\').val()
					$.ajax({
						url:\'../ajax.php\',
						type:\'POST\',
						data:{page:\'examgiver\',action:\'savestate\',key:key,answervalue:answerval},
						success:function(sata){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key+1);
							location.reload();
						}
					});
				}
				
				function bookmark(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
						}
					});
					$.ajax({
						url:\'../ajax.php\',
						type:\'POST\',
						data:{page:\'examgiver\',action:\'bookmark\',key:key},
						success:function(sata){
							window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key+1);
						}
					});
				}
				
				function bookmark2(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
						}
					});
					$.ajax({
						url:\'../ajax.php\',
						type:\'POST\',
						data:{page:\'examgiver\',action:\'bookmark\',key:key},
						success:function(sata){
							//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key+1);
							location.reload();
						}
					});
				}
				
				if('.$quesSHOWid.'==0){
					$("#previous").attr("disabled",true);
				}
				
				if('.($quesSHOWid+1).'=='.count($qid_array).'){
					$("#next").attr("disabled",true);
					$("#sandnext").html("SAVE");
					$("#sandnext").attr("onclick","saveandnext2('.$quesSHOWid.')");
					$("#bookmark").html("Bookmark");
					$("#bookmark").attr("onclick","bookmark2('.$quesSHOWid.')");
				}
				
				function next(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key+1);
						}
					});
				}
				
				function prev(key){
					var lefttime = $("#exam_timer").TimeCircles().getTime();
					$.ajax({
						url:"../ajax.php",
						type:"POST",
						data:{page:"examgiver",action:"storetime",leftExamTime:lefttime},
						success:function(){
							window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
						}
					});
					//window.location.href="EXAM_GIVER.php?examid='.$examId.'&quesSHOWid="+(key-1);
				}
				
				//$(\'#sandnext\').attr(\'disabled\',true);
				/*setInterval(function(){
					if(($(\'input[name="option"]:checked\').length ) > 0){
						$(\'#sandnext\').attr(\'disabled\',false);
					}else{
						$(\'#sandnext\').attr(\'disabled\',true);
					}
				}
			,1);*/
			
				var checked = {};
				$(\'.check\').each(function (index) {
				checked[index] = this.checked;
				$(this).click(function () {
				if (checked[index])
				this.checked = false;
				for (var i in checked) {
				checked[i] = false;
				}
				checked[index] = this.checked;
				});
				});
			
			
				</script>
					
			';
			
			echo $showQDemo;
			
			echo "
			<div class='col-md-4'>
			<br />
			<br />
			<div id='user_details_area'></div>		
			</div>
			</div>";
		}
		
	}
		
		
/****
पहले चेक करेगा कि session में savestatekey है या नही , अगर नही है तो बनाएगा else statement
खाली array बनाकर चेक करेगा कि post में answer सेट हुआ है या नही
अगर नही हुआ तो चेक करेगा savestatekey में जो key आई है post से वो है या नही
अगर नही है तो अच्छा है 	
अगर answer आया है तो चेक करेगा कि पहले से उस question का आंसर सेट है या नही
अगर है तो पहले वाली जगह पर ही answer डाल देगा
अगर नही तो नई offset बनाकर डाल देगा answer।
****/
		if($_POST['page']=='examgiver'){
			if($_POST['action']=='savestate'){
				//var_dump($_POST);
				session_start();
				if(isset($_SESSION['savestatekey'])){ // चेक करना कि savestatekey session में है या नही ?
				//var_dump($_POST);
					$keyArray = [$_POST['key']]; // अगर है तो key value को लेकर array बनाना ।
					//var_dump($keyArray);
					if(!isset($_POST['answervalue'])){ // चेक करना कि answer आया है या नही , अगर नही आया
						if(in_array($keyArray[0],$_SESSION['savestatekey'])){ // तो चेक करना कि जो की आयी है वो savestatekey में है या नही ?
						//echo "Before";
							//var_dump($_SESSION['savestatekey']);
							//var_dump($_SESSION['keyAnswerVal']);
							$kii = array_search($keyArray[0],$_SESSION['savestatekey']); // अगर है तो उसका offset (किस location ) पर है उसकी वैल्यू निकलना एंड उसे unset कर देना
							//echo $kii;
							unset($_SESSION['savestatekey'][$kii]);
							unset($_SESSION['keyAnswerVal'][$kii]);
						//echo "After";
							//var_dump($_SESSION['savestatekey']);
							//var_dump($_SESSION['keyAnswerVal']);
							
						}
					}else{ // अगर answer आया है तो
						$answerVal = [$_POST['key']."@".$_POST['answervalue']]; // array बनाना key एंड answer का
						if(in_array($keyArray[0],$_SESSION['savestatekey'])){ // चेक करना कही answerपहले से मौजूद तो नही
							$KEYofANS = array_search($keyArray[0],$_SESSION['savestatekey']); // अगर मौजूद है तो उसका स्थान Nइकलन एंड उसKई जगह पर नई आंसर रख देना
							$_SESSION['keyAnswerVal'][$KEYofANS] = $answerVal[0];
						}else{ // अगर नही तो नई offset ( location ) बनाकर डाल देना
							$_SESSION['savestatekey'] = array_merge($_SESSION['savestatekey'],$keyArray);
							$_SESSION['keyAnswerVal'] = array_merge($_SESSION['keyAnswerVal'],$answerVal);
						}
					}
				}else{
					$_SESSION['savestatekey'] = [];
					$_SESSION['keyAnswerVal'] = [];
					
					$keyArray = [$_POST['key']];
					//var_dump($keyArray);
					if(!isset($_POST['answervalue'])){
						if(in_array($keyArray[0],$_SESSION['savestatekey'])){
							//var_dump($_SESSION['savestatekey']);
							$kii = array_search($keyArray[0],$_SESSION['savestatekey']);
							//echo $kii;
							unset($_SESSION['savestatekey'][$kii]);
							unset($_SESSION['keyAnswerVal'][$kii]);
							//var_dump($_SESSION['savestatekey']);
						}
					}else{
						$answerVal = [$_POST['key']."@".$_POST['answervalue']];
						if(in_array($keyArray[0],$_SESSION['savestatekey'])){
							$KEYofANS = array_search($keyArray[0],$_SESSION['savestatekey']);
							$_SESSION['keyAnswerVal'][$KEYofANS] = $answerVal[0];
						}else{
							$_SESSION['savestatekey'] = array_merge($_SESSION['savestatekey'],$keyArray);
							$_SESSION['keyAnswerVal'] = array_merge($_SESSION['keyAnswerVal'],$answerVal);
						}
					}
				}
				
				//var_dump($_SESSION['savestatekey']);
			}
		}
	
		if($_POST['page']=='examgiver'){
			if($_POST['action']=='bookmark'){
				//var_dump($_POST);
				session_start();
				if(isset($_SESSION['bookmark'])){
					$keyArray = [$_POST['key']];
					$_SESSION['bookmark'] = array_merge($_SESSION['bookmark'],$keyArray);
				}else{
					$keyArray = [$_POST['key']];
					$_SESSION['bookmark'] = [];
					$_SESSION['bookmark'] = array_merge($_SESSION['bookmark'],$keyArray);
				}
				
				//var_dump($_SESSION['bookmark']);
			}
		}
	
	if($_POST['page']=='examgiver'){
		if($_POST['action']=='storetime'){
			session_start();
			$_SESSION['examSeconds'] = $_POST['leftExamTime'];
		}
	}
		
	}
	
?>