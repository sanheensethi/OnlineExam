<?php include "header.php"; ?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Course Table
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Courses</a></li>
            <li><a href="#">Add Courses</a></li>
            <!--<li class="active">Question List</li>-->
          </ol>
        </section>
		
		<!-- Main content -->
		<section class="content" id="addChapter">
		<div class="row">
		<!-- left column -->
		<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
		<div class="box-header">
		<h3 class="box-title">Add Chapter</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form">
		<div class="box-body">
		<div id="cid" class="form-group">
		<label for="chapterid">Chapter ID</label>
		<input type="text" class="form-control" id="chapterid" placeholder="Chapter ID" disabled>
		</div>
		<div class="form-group">
		<label for="subjectname">Chapter Name</label>
		<input type="text" class="form-control" id="chaptername" placeholder="Chapter Name">
		</div>
		
		</div><!-- /.box-body -->
		
		<div class="box-footer">
		<input type="submit" class="btn btn-danger" value="Cancel" id="Cancelbtn">
		<input type="submit" class="btn btn-success" value="Create" id="Createbtn">
		<input type="submit" class="btn btn-success" value="Update" id="Updatebtn">
		</div>
		</form>
		</div><!-- /.box -->
		</div>
		</div>
		</section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Total Number Of Subjects : <span id="total"></span></h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="">
                <div class="table-responsive" style="padding:10px">
                <br>
                <div id="message"></div>
                <div class="box-footer">
                <button type="submit" class="btn btn-info" id="addChapterBtn">ADD Chapter</button>
                </div>
					<div id="chapter_table"></div>
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
		$('#addChapter').hide();
		$('#Updatebtn').hide();
		$('#cid').hide();
		$('#message').hide();
		$('#addChapterBtn').on('click',function(e){
			e.preventDefault();
			$('#addChapter').show('slow','linear');
		});
		
		$('#Cancelbtn').on('click',function(e){
			e.preventDefault();
			$('#addChapter').hide('slow','linear');
		});
		
		$('#Createbtn').on('click',function(e){
			e.preventDefault();
			$.ajax({
				url:'../ajax.php',
				type:'POST',
				data:{page:'add_chapter',action:'add',subjectid:"<?php echo $_GET['sid']; ?>",chaptername:$('#chaptername').val()},
				success:function(data){
					$("#message").show("slow","linear");
					$('#message').html(data);
					$('#chaptername').val('');
					$('#addChapter').hide();
					setTimeout(function(){
						$('#message').hide('slow','linear');
					},3000);
				}
			});
		});
		
		$('#Updatebtn').on('click',function(e){
			e.preventDefault();
			$.ajax({
				url:'../ajax.php',
				type:'POST',
				data:{page:'add_chapter',action:'update',chapterId:$('#chapterid').val(),chapterName:$('#chaptername').val()},
				success:function(data){
					$("#message").show("slow","linear");
					$('#message').html(data);
					$('#chaptername').val('');
					$('#addChapter').hide('slow','linear');
					setTimeout(function(){
						$('#message').hide('slow','linear');
					},3000);
				}
			});
		});
		
		subject_id = "<?php echo $_GET['sid']; ?>";
		$.ajax({
			url:'../ajax.php',
			type:'POST',
			data:{page:'add_chapter',action:'fetch',subjectid:subject_id},
			success:function(data){
				$('#chapter_table').html(data);
			}
		});
	});
	</script>
  </body>
</html>