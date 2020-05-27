<?php include "header.php"; ?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Exam AIR
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>EXAMS</a></li>
            <li><a href="#">ADD</a></li>
            <!--<li class="active">Question List</li>-->
          </ol>
        </section>
		<section id="msg" class="content">
			<div class="row">
			<div class="col-md-6">
			<div class="box">
			<div class="box-header">
			<h3 class="box-title"><span id="total"></span></h3>
			</div><!-- /.box-header -->
			<div class="box-body" style="" >
				<div id="message"></div>
			</div>
			</div>
			</div>
			</div>
		</section>
        <!-- Main content -->
        <section class="content" id="examTable">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><span id="total"></span></h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="" >
                <div class="table-responsive" style="padding:10px">
                	<h4>SELECT EXAM TYPE</h4><br>
					<div id="examtype_table">
						<table  class='table table-bordered table-striped'>
						<thead>
						<tr>
						<th>Type</th>
						<th>SELECT</th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td><h4>Exam Type</h4></td>
								<td>
									<select class="form-control" id="examType">
										<option value="0">NONE</option>
										<option value="1">ASSIGNMENT</option>
										<option value="2">CHAPTER</option>
										<option value="3">MIXED</option>
										<option value="4">MOCK</option>
									</select>
								</td>
							</tr>
						</tbody>
						<tfoot>
						<tr>
						<th>Exam Type</th>
						<th>SELECT</th>
						</tr>
						</tfoot>
						</table>
					</div>
                </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<section class="content" id="contentAjax">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><span id="total"></span></h3>
        </div><!-- /.box-header -->
        <div class="box-body" style="" >
        <div class="table-responsive" style="padding:10px">
					<div id="mainContentAjax"></div>
		
        </div><!-- /.box-body -->
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<section class="content" id="AssignmentForm">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">ASSIGNMENT FORM <span id="total"></span></h3>
        </div><!-- /.box-header -->
        <div class="box-body" style="" >
				<div id="mainContentAjaxAssignment">
				<form>
					<div class="form-group">
						<label for="assignmentname">Assignment Name:</label>
						<input type="text" class="form-control" id="examname" placeholder="ASSIGNMENT NAME" required/>
					</div>
					<div class="form-group">
						<label for="examtype">Exam Type:</label>
						<input type="text" class="form-control" id="examtype" placeholder="TYPE" disabled required/>
					</div>
					<div class="form-group">
						<label for="courseid">Course ID:</label>
						<input type="text" class="form-control" id="courseid" placeholder="COURSE ID" disabled required/>
					</div>
					<div class="form-group">
						<label for="subjectid">Subject ID:</label>
						<input type="text" class="form-control" id="subjectid" placeholder="SUBJECT ID" disabled required/>
					</div>
					<div class="form-group">
						<label for="chapterid">Chapter ID:</label>
						<input type="text" class="form-control" id="chapterid" placeholder="TYPE" disabled required/>
					</div>
					<div class="form-group">
						<label for="startdate">Start Date : <span id="stdate" style="color:red"></span></label>
						<input type="date" class="form-control" style="display:inline-block;width:50px" id="startdate" placeholder="DATE" required/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<label>Start Time : <span id="sttime" style="color:red"></span></label>
						<input type="time" class="form-control" style="display:inline-block; width:50px" id="starttime" placeholder="TIME" required/>
					</div>
					<div class="form-group">
						<label for="duration">Duration : <span style="color:red">( in minutes )</span></label>
						<input type="number" class="form-control" id="duration" placeholder="DURATION" required/>
					</div>
					<div class="form-group">
						<label for="noq">Number Of Questions :</label>
						<input type="number" class="form-control" id="noq" placeholder="NUMBER OF QUESTIONS" required/>
					</div>
					<div class="form-group">
						<label for="mfr">Mark for Right Answer :</label>
						<input type="number" class="form-control" id="mfr" placeholder="MARK FOR RIGHT ANSWER" required/>
					</div>
					<div class="form-group">
						<label for="mfw">Mark for Wrong Answer :</label>
						<input type="text" class="form-control" id="mfw" placeholder="MARK FOR WRONG ANSWER" required/>
					</div>
					<div class="form-group">
						<label for="sfd">Select From Database :</label>
						<select class="form-control" id="sfd" required>
							<option value="2">NONE</option>
							<option value="1">YES</option>
							<option value="0">NO</option>
						</select>
						<div id="sfdShow" class="table-responsive" style="padding:10px">
							
							<div id="mainsfdShow"></div>
						
						</div><!-- /.box-body -->
					</div>
					<input type="submit" class="btn btn-success" value="Create" id="CreateAssignment" />
				</form>
				</div>
        </div><!-- /.box-body -->
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

   <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->

	<script>
	$(document).ready(function(){
		
		$('#contentAjax').hide();
		$('#AssignmentForm').hide();
		$('#sfdShow').hide();
		$('#msg').hide();
		
		$('#examType').on('change',function(){
			$('#examTable').hide('slow');
			$.ajax({
				url:'../ajax.php',
				type:'POST',
				data:{page:'exam',action:'createAIR',EType:$('#examType').val()},
				success:function(data){
					$('#contentAjax').show('slow','linear');
					$('#mainContentAjax').html(data);
				}
			});
		});
		
		$('#CreateAssignment').on('click',function(e){
			e.preventDefault();
			var questionSelectedIDS = [];
			$('.selectedQues:checked').each(function(i){
				questionSelectedIDS[i] = $(this).val();
			});
			//alert('run');
			var examname;
			var examtype;
			var courseid;
			var subjectid;
			var chapterid;
			var startdate;
			var starttime;
			var duration;
			var noq;
			var mfr; // mark for right
			var mfw; // mark for wrong
			var sfd;
			var checkboxlength;
			
				examname       = $('#examname').val();
				examtype       = $('#examtype').val();
				courseid       = $('#courseid').val();
				subjectid      = $('#subjectid').val();
				chapterid      = $('#chapterid').val();
				startdate      = $('#startdate').val();
				starttime      = $('#starttime').val();
				duration       = $('#duration').val();
				noq            = $('#noq').val();
				mfr            = $('#mfr').val();
				mfw            = $('#mfw').val();
				sfd            = $('#sfd').val();
				checkboxlength = $('#checkboxlength').val(); // if checkboxlength < totalQuestions ||=> select others random() ## if checkboxlength == totalQuestions then direct insert.
				checkboxID     = questionSelectedIDS;
				$.ajax({
					url:'../ajax.php',
					type:'POST',
					data:{
					page:'exam',
					action:'createAssignment',
					examName:examname,
					examType:examtype,
					courseId:courseid,
					subjectId:subjectid,
					chapterId:chapterid,
					start_date:startdate,
					start_time:starttime,
					dur:duration,
					totalQuestions:noq,
					markright:mfr,
					markwrong:mfw,
					selectfromdb:sfd,
					checkboxlen:checkboxlength,
					checkedQIDS:checkboxID
					},
					success:function(data){
						//$('#AssignmentForm').hide('slow','linear');
						$('#msg').show('slow','linear');
						
						$('#message').html(data);
						//$('#contentAjax').show('slow','linear');
					}
				});
			
		});
		
		$('#startdate').on('change',function(){
			dt = $('#startdate').val();
			res = dt.split("-");
			$('#stdate').html(res[2]+"/"+res[1]+"/"+res[0]);
		});
		
		$('#starttime').on('change',function(){
			$('#sttime').html($('#starttime').val());
		});
		
		$('#sfd').on('change',function(){
			
			courseid       = $('#courseid').val();
			subjectid      = $('#subjectid').val();
			chapterid      = $('#chapterid').val();
			
			if($('#sfd').val()==1){
				$.ajax({
					url:'../ajax.php',
					type:'POST',
					data:{
					page:'exam',
					action:'selectfromdatabase',
					totalQuestions:$('#noq').val(),
					courseId:courseid,
					subjectId:subjectid,
					chapterId:chapterid
					},
					success:function(data){
						$('#sfdShow').show('slow','linear');
						$('#mainsfdShow').html(data);
					}
				});
			}
			if($('#sfd').val()==0){
				$('#sfdShow').hide('slow','linear');
				//autoselect
			}
			if($('#sfd').val()==2){
				alert('SELECT YES OR NO.');
			}
		});
	});
	</script>
  </body>
</html>