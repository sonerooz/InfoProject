<!-- #section:basics/sidebar -->
<div class="sidebar" id="sidebar">
	<ul class="nav nav-list">
		<li id="sideHome" <?php echo ($page == 'index') ? "class='active'" : ""; ?>>
			<a href="index.php">
				<i class="icon-home home-icon"></i>
				<span class="menu-text"> Home </span>
			</a>
		</li>

		<li id="sideOrders" <?php echo ($page == 'orders') ? "class='active'" : ""; ?> >
			<a href="orders.php">
				<i class="icon-apple"></i>
				<span class="menu-text"> Orders </span>
			</a>
		</li>

		<li id="sideUsers" <?php echo ($page == 'users') ? "class='active'" : ""; ?>>
			<a href="user-search.php">
				<i class="icon-user"></i>
				<span class="menu-text"> Users </span>
			</a>
		</li>
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>
