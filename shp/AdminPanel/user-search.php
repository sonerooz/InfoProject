<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Users - Shopping Admin</title>
		<?php 
			require_once("../Connection/system.php");
			include("_Layout/_head.php");
			require_once("../Facade/Facade.php");
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
				$page = "users";
				include("_Layout/_sidebar.php");
			?>
			
			<div class="main-content">
				<?php
					$directory = array("User-Search", "active", "none");
					
					include("_Layout/_location.php");
				?>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="smaller">Search</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<!--PAGE CONTENT BEGINS-->

										<form class="form-horizontal" method="POST" action="users.php">
											<div class="control-group">
												<label class="control-label" for="username">Username</label>

												<div class="controls">
													<input type="text" id="username" name="word" placeholder="type here" />
												</div>
											</div>
											<div class="form-actions">
												<button id="search-user" class="btn btn-info" type="submit">
													<i class="icon-search bigger-110"></i>
													Search
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div><!--/span-->
					</div><!--/row-->
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
		
		<script src="js/user-search.js"></script>
		
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


