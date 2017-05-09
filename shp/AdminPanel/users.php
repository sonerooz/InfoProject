<?php 
	require_once("../Connection/system.php");
	require_once("../Facade/Facade.php");
	//include("../Entity/EUser.php");
	$errorMessage = "";
	$word = "";
	if(isset($_POST["word"]))
	{
		$word = $_POST["word"];
	}
	
	$result = FUser::getUsers($word);
	
	if(!$result) {
		$errorMessage = "USERS CANNOT BE LISTED!";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Users - Shopping Admin</title>
		<?php 
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
				$page = "users";
				include("_Layout/_sidebar.php");
			?>
			
			<div class="main-content">
				<?php
					$directory = array("User-Search", "user-search.php", "icon-user home-icon", "Users", "active", "none");
					
					include("_Layout/_location.php");
				?>
				
				<div class="page-content">

					<div class="row-fluid">
						<div class="table-header">
							list of users their usernames includes ""
						</div>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="hidden-480"><i class="icon-info-sign bigger-110 hidden-phone"></i>User ID</th>
									<th class="hidden-480"><i class="icon-user bigger-110 hidden-phone"></i>Username</th>
									<th class="hidden-480"><i class="icon-user bigger-110 hidden-phone"></i>Name Surname</th>
									<th class="hidden-480"><i class="phone bigger-110 hidden-phone"></i>Phone Number</th>
									<th class="hidden-480"><i class="eye bigger-110 hidden-phone"></i>User Type</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$userList = $result;
									
									$userList = FUser::getUsers($word);
									for($i = 0; $i < count($userList); $i++ )
									{
										echo "<tr id='user".$userList[$i]->userID."' class='userRow'>";
										echo "<td>".$userList[$i]->userID."</td>";
										echo "<td>".$userList[$i]->userName."</td>";
										echo "<td>".$userList[$i]->name." ".$userList[$i]->surname."</td>";
										echo "<td>".$userList[$i]->phoneNumber."</td>";
										switch($userList[$i]->userType)
										{
											case 0: echo "<td><span class='label label-inverse'>Banned</span></td>";break;
											case 1: echo "<td><span class='label label-success'>Registered</span></td>";break;
											case 2: echo "<td><span class='label label-warning'>Admin</span></td>";break;
										}
										echo "</tr>";
									}
									
									?>
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
		<script src="js/users.js"></script>

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
