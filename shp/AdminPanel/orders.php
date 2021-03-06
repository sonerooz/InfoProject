<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Orders - Shopping Admin</title>
		<?php 
			require_once("../Connection/system.php");
			include("_Layout/_head.php");
			require_once("../Facade/Facade.php");
			
			$result = FOrder::getOrders();
	
			if(!$result) {
				$errorMessage = "ORDERS CANNOT BE LISTED!";
			}
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
				$page = "orders";
				include("_Layout/_sidebar.php");
			?>
			
			<div class="main-content">
			
				<?php
					$directory = array("Order List", "active", "none");
					
					include("_Layout/_location.php");
				?>

				<div class="page-content">

					<div class="row-fluid">
						<div class="table-header">
							Results for All Orders
						</div>
						<table id="sample-table-2" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="hidden-480">Order ID</th>
									<th class="hidden-480"><i class="icon-user bigger-110 hidden-phone"></i>Username</th>
									<th class="hidden-480">Name Surname</th>
									<th class="hidden-480"><i class="green icon-money bigger-110 hidden-phone"></i>Total Price</th>
									<th class="hidden-480"><i class="icon-home bigger-110 hidden-phone"></i>Address</th>
									<th class="hidden-480"><i class="icon-time bigger-110 hidden-phone"></i>Date</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$orderList = $result;
										
									error_reporting(0);
									for($i = 0; $i < count($orderList); $i++ )
									{
										echo "<tr id='order".$orderList[$i]->orderID."' class='orderRow'>";
										echo "<td>".$orderList[$i]->orderID."</td>";
										echo "<td><a href='user-profile.php?id=".$orderList[$i]->user->userID."'>".$orderList[$i]->user->userName."</a></td>";
										echo "<td>".$orderList[$i]->user->name." ".$orderList[$i]->user->surname."</td>";
										echo "<td>".$orderList[$i]->totalPrice."</td>";
										echo "<td>".$orderList[$i]->address->country." ".$orderList[$i]->address->city." ".$orderList[$i]->address->town."</td>";
										echo "<td>".$orderList[$i]->date."</td>
										
										</tr>";
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
