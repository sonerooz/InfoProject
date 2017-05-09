<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home - Shopping Admin</title>
		<?php 
			require_once("../Connection/system.php");
			include("_Layout/_head.php");
		?>
	</head>

	<body>
		<?php
			include("_Layout/_nav.php");
		?>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php
				$page = "index";
				include("_Layout/_sidebar.php");
			?>

			<div class="main-content">
				
				<?php
					$directory = array("Messages & Logs", "active", "none");
					
					include("_Layout/_location.php");
				?>
				
				

				<div class="page-content">

					<div class="row-fluid">
						
						<div class="widget-box">
							<div class="widget-header">
								<h5><a href="user-profile.php?id=7">sonerooz</a> (soner-oz642@hotmail.com)</h5>

								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="icon-chevron-up"></i>
									</a>

									<a href="#" data-action="close">
										<i class="icon-remove"></i>
									</a>
								</div>
							</div>

							<div class="widget-body">
							<div class="widget-body-inner" style="display: block;">
								<div class="widget-main">
									<p class="alert alert-info">
										Şikayet
									</p>
									<div class="space-6"></div>
									Şikayetim var
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
					
						<div class="widget-box">
							<div class="widget-header">
								<h5><a href="user-profile.php?id=3">haydos17</a> (haydos17@gmail.com)</h5>

								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="icon-chevron-up"></i>
									</a>

									<a href="#" data-action="close">
										<i class="icon-remove"></i>
									</a>
								</div>
							</div>

							<div class="widget-body">
							<div class="widget-body-inner" style="display: block;">
								<div class="widget-main">
									<p class="alert alert-info">
										Ürünler
									</p>
									<div class="space-6"></div>
									Ürünleri göremiyorum
								</div>
							</div>
						</div>
						<div class="space-6"></div>
					</div>
					<div class="row-fluid">
						<div class="table-header">
							Results for "Latest Registered Activities"
						</div>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="hidden-480">username <i class="icon-user bigger-110 hidden-phone"></i></th>
									<th class="hidden-480">product name <i class="icon-apple bigger-110 hidden-phone"></i></th>
									<th class="hidden-480">activities <i class="icon-list bigger-110 hidden-phone"></i></th>
									<th class="hidden-480">date <i class="icon-time bigger-110 hidden-phone"></i></th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>
										<a href="user-profile.php?id=7">sonerooz</a>
									</td>
									<td></td>
									<td>Giriş Yaptı</td>
									<td>09.04.2017 14:53</td>
								</tr>
								<tr>
									<td>
										<a href="user-profile.php?id=1">bykutlu</a>
									</td>
									<td></td>
									<td>Giriş Yaptı</td>
									<td>09.04.2017 14:55</td>
								</tr>
								<tr>
									<td>
										<a href="user-profile.php?id=7">sonerooz</a>
									</td>
									<td>bilgisayar</td>
									<td>sepete attı</td>
									<td>09.04.2017 15:02</td>
								</tr>
								<tr>
									<td>
										<a href="user-profile.php?id=1">bykutlu</a>
									</td>
									<td></td>
									<td>Admin paneline girdi</td>
									<td>09.04.2017 15:12</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null,
			      null,
				  null,
				  null
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
	</body>
</html>
