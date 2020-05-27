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
        <!-- Main content -->
<section class="content" id="SearchForm">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Search<span id="total"></span></h3>
        </div><!-- /.box-header -->
        <div class="box-body" style="" >
				<form>
					<div class="form-group">
						<label for="Searchid">Question ID :</label>
						<input type="number" class="form-control" id="quesid" placeholder="Question ID" required/>
					</div>
					<h3>OR</h3>
					<div class="form-group">
					<label for="Searchid">Question Text :</label>
					<textarea class="form-control" id="questext" placeholder="Question Text"></textarea>
					</div>
				</form>
				<div id="resulttable">
				<div class="table-responsive" style="padding:10px">
					<div id="table-data"></div>
				</div>
				</div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>




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
			$('#resulttable').hide();
			$('#quesid').on('keyup',function(){
				questionid = $('#quesid').val();
				$.ajax({
					url:'../ajax.php',
					type:'POST',
					data:{page:'searchques',action:'search',id:questionid},
					success:function(data){
						$('#table-data').html(data);
						$('#resulttable').show('slow','linear');
					}
				});
				
			});
			
			$('#questext').on('keyup',function(){
				questiontext = $('#questext').val();
				$.ajax({
					url:'../ajax.php',
					type:'POST',
					data:{page:'searchques',action:'search',questex:questiontext},
					success:function(data){
						$('#table-data').html(data);
						$('#resulttable').show('slow','linear');
					}
				});
				
			});
			
		});
	</script>
  </body>
</html>