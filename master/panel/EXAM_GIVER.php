<?php
	include "QUESTION_HEADER.php";
?>
      <!-- Left side column. contains the logo and sidebar -->
     <body class="skin-blue">
     <div class="wrapper">
     
     <header class="main-header">
     <!-- Logo -->
     <a href="javascript:void(0)" class="logo"><b>Admin</b>Pannel</a>
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top" role="navigation">
     <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
     <span class="sr-only">Toggle navigation</span>
     </a>
     <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
     <!-- Messages: style can be found in dropdown.less-->

     <!-- User Account: style can be found in dropdown.less -->
     <li class="dropdown user user-menu">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
     <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
     <span class="hidden-xs">Sanheen Sethi</span>
     </a>
     <ul class="dropdown-menu">
     <!-- User image -->
     <li class="user-header">
     <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
     <p>
     Sanheen Sethi - Admin
     <small>Date : </small>
     </p>
     </li>
</ul>
</li>
</ul>
</div>
</nav>
</header>
     
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        	<div id="show"></div>
		</section><!-- /.content -->
</div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="style/TimeCircles.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
      <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script>
    $(document).ready(function(){
    		
    var checked = {};
    $('.check').each(function (index) {
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
    

    		
    		
    	/*	$(function () {
    		/* For demo purposes */
    /*		var demo = $("<div />").css({
    		position: "fixed",
    		top: "70px",
    		right: "0",
    		background: "#fff",
    		"border-radius": "5px 0px 0px 5px",
    		padding: "10px 15px",
    		"font-size": "16px",
    		"z-index": "99999",
    		cursor: "pointer",
    		color: "#3c8dbc",
    		"box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
    		}).html("<i class='fa fa-list'></i>").addClass("no-print");
    		
    		var demo_settings = $("<div />").css({
    		"padding": "10px",
    		position: "fixed",
    		top: "70px",
    		right: "-250px",
    		background: "#fff",
    		border: "0px solid #ddd",
    		"width": "250px",
    		"z-index": "99999",
    		"box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
    		}).addClass("no-print");
    		
    		data = "";
    		for(var i = 1 ; i <=10 ; i++){
    			data += "<li><a href='javascript:void(0)' onclick='callQ()'>"+i+"</a></li>";
    		}
    		
    		demo_settings.append(
    		"<h4 class='text-light-blue' style='margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;'>QUESTION NAVIGATION</h4>"
    		//Fixed layout
    		+ "<ul class='pagination'>"
    		+ data
    		+ "</ul>"
    		);
    		
    		
    		demo.click(function () {
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
    		
    		});*/
    		
    });
    $.ajax({
    	url:'../ajax.php',
    	type:'POST',
    	data:{page:'examgiver',action:'checkview',examId:"<?= $_GET['examid']; ?>",quesSHOWid:"<?= $_GET['quesSHOWid']; ?>"},
    	success:function(data){
    		$('#show').html(data);
    	}
    });
    
    
    </script>
    
    </body>
    </html>
    