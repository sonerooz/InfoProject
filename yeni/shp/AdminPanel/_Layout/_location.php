<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">Home</a>
			
			<span class='divider'>
				<i class='icon-angle-right arrow-icon'></i>
			</span>
		</li>
		
		<?php
			for($i = 0; $i < count($directory); $i+=3)
			{
				
				if($directory[$i+1] == "active")
					echo "<li class='active'>".$directory[$i]."</li>";
				else
				{
					echo "<li>
							<i class='".$directory[$i+2]."'></i>
							<a href='".$directory[$i+1]."'>$directory[$i]</a>";
				}
				if($i+3 < count($directory))
				{
					echo "<span class='divider'>
						<i class='icon-angle-right arrow-icon'></i>
						</span>";
				}
			}
		?>
	</ul><!--.breadcrumb-->
</div>