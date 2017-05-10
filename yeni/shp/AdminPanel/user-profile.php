<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Users - Shopping Admin</title>
		<?php 
			require_once("../Connection/system.php");
			include("_Layout/_head.php");
			require_once("../Facade/Facade.php");
			
			$errorMessage = "";
			$userID = "";
			$user = null;
			if(isset($_GET["id"]))
			{
				$userID = $_GET["id"];
				$user = FUser::getUser($userID);
			}
			
			if(isset($_POST["new-address-name"]) && isset($_POST["country"]) && isset($_POST["city"]) && isset($_POST["town"]) && isset($_POST["address-detail"]))
			{
				$name = $_POST["new-address-name"];
				$_POST["new-address-name"] = null;
				$country = $_POST["country"];
				$city = $_POST["city"];
				$town = $_POST["town"];
				$detail = $_POST["address-detail"];
				FAddress::addNewAddress($userID, $name, $country, $city, $town, $detail);
				header("Location: user-profile.php?id=$userID");
			}
			
			if(!$user) {
				$errorMessage = "Böyle bir kullanıcı bulunamadı!";
			}
		?>

		<!--page specific plugin styles-->
		<link rel="stylesheet" href="css/button.css" />
		
		
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />
				
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
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
					$directory = array("User-Search", "user-search.php", "icon-user home-icon", "Users", "active", "none", "User Profile", "active", "none");
					
					include("_Layout/_location.php");
				?>
				
				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div id="user-profile" class="user-profile row-fluid">
								<div>
									<div class="space"></div>

									<form class="form-horizontal">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-16">
												<li id="info-basic" class="active">
													<a data-toggle="tab" href="#edit-basic">
														<i class="green icon-edit bigger-125"></i>
														Basic Info
													</a>
												</li>

												<li id="info-address">
													<a data-toggle="tab" href="#edit-address">
														<i class="purple icon-home bigger-125"></i>
														Address
													</a>
												</li>

												<li id="info-card">
													<a data-toggle="tab" href="#edit-cardinfo">
														<i class="red icon-credit-card bigger-125"></i>
														Card Info
													</a>
												</li>
												
												<li id="info-password">
													<a data-toggle="tab" href="#edit-password">
														<i class="blue icon-key bigger-125"></i>
														Password
													</a>
												</li>
											</ul>

											<div class="tab-content profile-edit-tab-content">
												<div id="edit-basic" class="tab-pane in active">
													<h4 class="header blue bolder smaller">General</h4>

													<div class="row-fluid">

														<div class="span12">
															<div class="control-group">
																<label class="control-label" for="form-field-username">Username</label>

																<div class="controls">
																	<input readonly="" type="text" id="form-field-username" placeholder="Username" value=<?php echo $user->userName ?> />
																</div>
															</div>

															<div class="control-group">
																<label class="control-label" for="form-field-first">Name</label>

																<div class="controls">
																	<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value=<?php echo $user->name ?> />
																	<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value=<?php echo $user->surname ?> />
																</div>
															</div>
															
															<div class="control-group">
																<label class="control-label" for="form-field-username">Identification</label>

																<div class="controls">
																	<input readonly="" type="text" id="form-field-username" placeholder="Username" value=<?php echo $user->identification ?> />
																</div>
															</div>
														</div>
													</div>

													<hr />
													<div class="control-group">
														<label class="control-label" for="form-field-date">Birth Date</label>

														<div class="controls">
															<div class="input-append">
																<input class="input-small date-picker" id="form-field-date" type="text" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value=<?php echo $user->birthday ?> />
																<span class="add-on">
																	<i class="icon-calendar"></i>
																</span>
															</div>
														</div>
													</div>

													<div class="control-group">
														<label class="control-label">Gender</label>

														<div class="controls">
															<div class="space-2"></div>

															<label class="inline">
																<input id="gender-male" name="form-field-radio" type="radio" <?php if($user->gender == "Male") echo "checked='checked'"?>/>
																<span class="lbl"> Male</span>
															</label>

															&nbsp; &nbsp; &nbsp;
															<label class="inline">
																<input id="gender-female" name="form-field-radio" type="radio" <?php if($user->gender == "Female") echo "checked='checked'"?>/>
																<span class="lbl"> Female</span>
															</label>
														</div>
													</div>

													<div class="space"></div>
													<h4 class="header blue bolder smaller">Contact</h4>

													<div class="control-group">
														<label class="control-label" for="form-field-email">Email</label>

														<div class="controls">
															<span class="input-icon input-icon-right">
																<input type="email" id="form-field-email" value=<?php echo $user->email ?> />
																<i class="icon-envelope"></i>
															</span>
														</div>
													</div>

													<div class="control-group">
														<label class="control-label" for="form-field-phone">Phone</label>

														<div class="controls">
															<span class="input-icon input-icon-right">
																<input class="input-medium input-mask-phone" type="text" id="form-field-phone" value=<?php echo $user->phoneNumber ?> />
																<i class="icon-phone icon-flip-horizontal"></i>
															</span>
														</div>
													</div>

													<div class="space"></div>
													
													<div class="form-actions">
														<button id="save-user-basic-info" class="btn btn-info" type="button">
															<i class="icon-ok bigger-110"></i>
															Save
														</button>

														&nbsp; &nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="icon-undo bigger-110"></i>
															Reset
														</button>
													</div>
												</div>

												<div id="edit-address" class="tab-pane">
													<div class="space-12"></div>
													<!--<div class="row-fluid">-->
													
													<?php
														$addresses = $user->addresses;
														for($i = 0; $i < count($addresses) ; $i++)
														{
															$address = $addresses[$i];
															echo '<div class="span12 widget-container-span">
																<div class="widget-box light-border">
																<div class="widget-header header-color-dark">
																	<h5 class="smaller">#';
															echo $address->addressID;
															echo " <span class='editable text-info'>";
															echo $address->addressName;
															echo "</span> 
																</h5>
																<div class='widget-toolbar'>
																	<a id='close".$address->addressID."' class='closeAddress' href='#' data-action='close'>
																		<i class='icon-remove'></i>
																	</a>
																</div>
															</div>";
															echo '<div class="widget-body">
																<div class="widget-main padding-6">
																	
																	<div class="profile-user-info profile-user-info-striped">
																		

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Location: </div>

																			<div class="profile-info-value">
																				<i class="icon-globe purple bigger-110"></i>
																				<span class="editable text-info">'.$address->country.'</span>
																				<span class="editable text-info">'.$address->city.'</span>
																				<span class="editable text-info">'.$address->town.'</span>
																			</div>
																		</div>
																		
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Details: </div>

																			<div class="profile-info-value">
																				<i class="icon-map-marker purple bigger-110"></i>
																				<span class="editable text-long">'.$address->detail.'</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
															
															echo "</div></div>";
														}
													
													?>
													
													
													<div class="span12 widget-container-span">
														<button class="btn btn-default btn-block" id="new-address">Add new Address</button>
													</div>
													
												</div>
	
												<div id="edit-cardinfo" class="tab-pane">
													<div class="space-12"></div>
													<!--<div class="row-fluid">-->
													
													<?php
														$cards = $user->cards;
														for($i = 0; $i < count($cards) ; $i++)
														{
															$card = $cards[$i];
															echo '<div class="span12 widget-container-span">
																<div class="widget-box light-border">
																<div class="widget-header header-color-dark">
																	<h5 class="smaller">#';
															echo $card->cardID;
															echo " <span class='editable text-info'>";
															echo $card->cardName;
															echo "</span> 
																</h5>
																<div class='widget-toolbar'>
																	<a href='#' data-action='close'>
																		<i class='icon-remove'></i>
																	</a>
																</div>
															</div>";
															echo '<div class="widget-body">
																<div class="widget-main padding-6">
																	
																	<div class="profile-user-info profile-user-info-striped">
																		

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Card No: </div>

																			<div class="profile-info-value">
																				<i class="icon-credit-card light-orange bigger-110"></i>
																				<span class="editable text-info">'.$card->cardNo.'</span>
																			</div>
																		</div>
																		
																		<div class="profile-info-row">
																			<div class="profile-info-name"> CVC: </div>

																			<div class="profile-info-value">
																				<i class="icon-lock light-orange bigger-110"></i>
																				<span class="editable text-info">'.$card->CVC.'</span>
																			</div>
																		</div>
																		
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Expiration date: </div>

																			<div class="profile-info-value">
																				<i class="icon-calendar light-orange bigger-110"></i>
																				<span class="editable date-month">'.$card->expirationMonth.'</span>
																				<span class="editable date-year">'.$card->expirationYear.'</span>
																			</div>
																		</div>
																		
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Owner: </div>

																			<div class="profile-info-value">
																				<i class="icon-user light-orange bigger-110"></i>
																				<span class="editable text-info">'.$card->ownerName.'</span>
																				<span class="editable text-info">'.$card->ownerSurname.'</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
															
															echo "</div></div>";
														}
													
													?>
													
													
													<div class="span12 widget-container-span">
														<button class="btn btn-default btn-block" id="new-credit-card">Add new Credit Card</button>
													</div>
												</div>
												
												<div id="edit-password" class="tab-pane">
													<div class="space-10"></div>

													<div class="control-group">
														<label class="control-label" for="form-field-pass1">New Password</label>

														<div class="controls">
															<input type="password" id="form-field-pass1" />
														</div>
													</div>

													<div class="control-group">
														<label class="control-label" for="form-field-pass2">Confirm Password</label>

														<div class="controls">
															<input type="password" id="form-field-pass2" />
														</div>
													</div>
													
													<div class="form-actions">
														<button id="save-user-password" class="btn btn-info" type="button">
															<i class="icon-ok bigger-110"></i>
															Save
														</button>

														&nbsp; &nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="icon-undo bigger-110"></i>
															Reset
														</button>
													</div>
												</div>
											</div>
										</div>

										
									</form>
								</div><!--/span-->
							</div><!--/user-profile-->
							
							<div id="modal-address" class="modal hide fade" tabindex="-1">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										Adres ekleme penceresi
									</div>
								</div>

								<div class="modal-body no-padding">
									<div class="row-fluid">
										<div class="span12">
											<!--PAGE CONTENT BEGINS-->

											<form id="form-add-new-address" class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=".$userID?>">
											
												<div class="space-4"></div>
												
												<div class="control-group">
													<label class="control-label" for="new-name">Name:</label>

													<div class="controls">
														<input type="text" id="new-address-name" name="new-address-name" placeholder="Name for reminders" />
														
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="new-address-country">Location:</label>

													<div class="controls">
														<input type="text" id="new-address-country" name="country" placeholder="Country" />
														<input type="text" id="new-address-city" name="city" placeholder="City" />
														<input type="text" id="new-address-town" name="town" placeholder="Town" />
														
													</div>
												</div>

												<div class="control-group">
													<label class="control-label" for="new-address-detail">Details:</label>

													<div class="controls">
														<textarea class="span9" id="new-address-detail" name="address-detail" data-provide="markdown" rows="5" placeholder="street etc"></textarea>
													</div>
												</div>
												
											</form>
										</div>
									
									</div>
								</div>

								<div class="modal-footer">
									

									<div class="pagination pull-right no-margin">
										<button type="submit" form="form-add-new-address" value="Submit">
											<i class="icon-ok bigger-110"></i>
											Add The Address
										</button>
										
									</div>
								</div>
							</div>
						
							<div id="modal-credit-card" class="modal hide fade" tabindex="-1">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										Adding Credit Card Window
									</div>
								</div>

								<div class="modal-body no-padding">
									<div class="row-fluid">
										<div class="span12">
											<!--PAGE CONTENT BEGINS-->
											
											<form class="form-horizontal">
												<div class="space-4"></div>
													
												<div class="control-group">
													<label class="control-label" for="new-card-name">Name:</label>

													<div class="controls">
														<input type="text" id="new-card-name" placeholder="Name for reminders" />
														
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="new-card-no">Card No:</label>

													<div class="controls">
														<input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="new-card-no" placeholder="Card" maxlength="16" />
													</div>
												</div>

												<div class="control-group">
													<label class="control-label" for="new-card-cvc">CVC:</label>

													<div class="controls">
														<input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="new-card-cvc" placeholder="CVC" maxlength="3"/>
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="new-card-expirationMonth">Expiration-Date:</label>

													<div class="controls">
														<input type="text" class="input-mini spinnerMonth" id="new-card-expirationMonth"/>
														<input type="text" class="input-mini spinnerYear" id="new-card-expirationYear"/>
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="new-ownerName">Owner Name</label>

													<div class="controls">
														<input type="text" id="new-ownerName" placeholder="Name" />
														<input type="text" id="new-ownerSurname" placeholder="Surname" />
													</div>
												</div>
												
												
											</form>
										</div>
									
									</div>
								</div>

								<div class="modal-footer">
									

									<div class="pagination pull-right no-margin">
										<button class="btn btn-small btn-info pull-left" data-dismiss="modal">
											<i class="icon-ok bigger-110"></i>
											Add The Card
										</button>
										
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
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
		<script src="js/user-profile.js"></script>
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize-min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.hotkeys.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="assets/js/x-editable/ace-editable.min.js"></script>
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
		<script type="text/javascript">
			$(function() {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				$(".chzn-select").chosen(); 
				
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea[class*=limited]').each(function() {
					var limit = parseInt($(this).attr('data-maxlength')) || 100;
					$(this).inputlimiter({
						"limit": limit,
						remText: '%n character%s remaining...',
						limitText: 'max allowed : %n.'
					});
				});
				
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
				
				
				
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 6,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 11,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'span'+val).val('.span'+val).next().attr('class', 'span'+(12-val)).val('.span'+(12-val));
					}
				});
				
				
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1]+"";
			
						if(! ui.handle.firstChild ) {
							$(ui.handle).append("<div class='tooltip right in' style='display:none;left:15px;top:-8px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('a').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'small'
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
			
				//dynamically change allowed formats by changing before_change callback function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var before_change
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "icon-picture";
						before_change = function(files, dropped) {
							var allowed_files = [];
							for(var i = 0 ; i < files.length; i++) {
								var file = files[i];
								if(typeof file === "string") {
									//IE8 and browsers that don't support File Object
									if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
								}
								else {
									var type = $.trim(file.type);
									if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
											|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
										) continue;//not an image so don't keep this file
								}
								
								allowed_files.push(file);
							}
							if(allowed_files.length == 0) return false;
			
							return allowed_files;
						}
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "icon-cloud-upload";
						before_change = function(files, dropped) {
							return files;
						}
					}
					var file_input = $('#id-input-file-3');
					file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
					file_input.ace_file_input('reset_input');
				});
			
			
			
			
				$('.spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.on('change', function(){
					//alert(this.value)
				});
				$('.spinner2').ace_spinner({value:0,min:0,max:10000,step:100, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
				$('.spinner3').ace_spinner({value:0,min:-100,max:100,step:10, icon_up:'icon-plus', icon_down:'icon-minus', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('.spinnerMonth').ace_spinner({value:1,min:1,max:12,step:1, icon_up:'icon-plus', icon_down:'icon-minus', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('.spinnerYear').ace_spinner({value:17,min:17,max:57,step:1, icon_up:'icon-plus', icon_down:'icon-minus', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				
			
				
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#id-date-range-picker-1').daterangepicker().prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
				
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				})
				
				$('#colorpicker1').colorpicker();
				$('#simple-colorpicker-1').ace_colorpicker();
			
				
				$(".knob").knob();
				
				
				//we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
				var tag_input = $('#form-field-tags');
				if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
					tag_input.tag({placeholder:tag_input.attr('placeholder')});
				else {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
			
			
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('show', function () {
					$(this).find('.chzn-container').each(function(){
						$(this).find('a:first-child').css('width' , '200px');
						$(this).find('.chzn-drop').css('width' , '210px');
						$(this).find('.chzn-search input').css('width' , '200px');
					});
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element has a width now and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
			});
		</script>
		<script type="text/javascript">
			$(function() {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    
				
				//editables 
				$(".text-info").editable({
					type: 'text',
					name: 'info'
				});
				
				$('.text-long').editable({
					mode: 'inline',
			        type: 'textarea',
					name : 'long'
				});
			    $('#username').editable({
			           type: 'text',
			           name: 'username'
			    });
			
				var countries = [];
			    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
			        countries.push({id: k, text: v});
			    });
			
				var cities = [];
				cities["CA"] = [];
				$.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
					cities["CA"].push({id: v, text: v});
				});
				cities["IN"] = [];
				$.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
					cities["IN"].push({id: v, text: v});
				});
				cities["NL"] = [];
				$.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
					cities["NL"].push({id: v, text: v});
				});
				cities["TR"] = [];
				$.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
					cities["TR"].push({id: v, text: v});
				});
				cities["US"] = [];
				$.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
					cities["US"].push({id: v, text: v});
				});
				
				var currentValue = "NL";
			    $('#country').editable({
					type: 'select2',
					value : 'NL',
			        source: countries,
					success: function(response, newValue) {
						if(currentValue == newValue) return;
						currentValue = newValue;
						
						var source = (!newValue || newValue == "") ? [] : cities[newValue];
						$('#city').editable('destroy').editable({
							type: 'select2',
							source: source
						}).editable('setValue', null);
					}
			    });
			
				$('#city').editable({
					type: 'select2',
					value : 'Amsterdam',
			        source: cities[currentValue]
			    });
			
			
			
				$('#signup').editable({
					type: 'date',
					format: 'yyyy-mm-dd',
					viewformat: 'dd/mm/yyyy',
					datepicker: {
						weekStart: 1
					}
				});
			
			    $('#age').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 16, max:99, step:1
					}
				});
				
				$('.date-month').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 1, max:12, step:1
					}
				});
				
				$('.date-year').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 17, max:57, step:1
					}
				});
				
				//var $range = document.createElement("INPUT");
				//$range.type = 'range';
			    $('#login').editable({
			        type: 'slider',//$range.type == 'range' ? 'range' : 'slider',
					name : 'login',
					slider : {
						min : 1, max:50, width:100
					},
					success: function(response, newValue) {
						if(parseInt(newValue) == 1)
							$(this).html(newValue + " hour ago");
						else $(this).html(newValue + " hours ago");
					}
				});
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exception, so let's catch it
			
					//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
					//so let's have a fake appendChild for it!
					if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							/**
							//this will override the default before_change that only accepts image files
							before_change: function(files, dropped) {
								return true;
							},
							*/
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							max_size: 110000,//~100Kb
							on_error : function(code) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(code == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(code == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//You can replace the contents of this function with examples/profile-avatar-update.js for actual upload
			
			
							var deferred = new $.Deferred
			
							//if value is empty, means no valid files were selected
							//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
							//so we return just here to prevent problems
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
				
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal hide fade">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						<div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						</div>\
						\
						<div class="modal-footer center">\
							<button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
							<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
						</div>\
						</form>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'icon-picture',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						before_change: function(files, dropped) {
							var file = files[0];
							if(typeof file === "string") {
								//file is just a file name here (in browsers that don't support FileReader API)
								if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
							}
							else {//file is a File object
								var type = $.trim(file.type);
								if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
										|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
									) return false;
			
								if( file.size > 110000 ) {//~100Kb
									return false;
								}
							}
			
							return true;
						}
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='icon-spinner icon-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});
			
				
			
				//////////////////////////////
				$('#profile-feed-1').slimScroll({
				height: '250px',
				alwaysVisible : true
				});
			
				$('.profile-social-links > a').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
			  
				///////////////////////////////////////////
			
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function() {
					return false;
				});
			
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'icon-picture',
					thumbnail:'large',
					droppable:true,
					before_change: function(files, dropped) {
						var file = files[0];
						if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
							if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
						}
						else {//file is a File object
							var type = $.trim(file.type);
							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
									|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
								) return false;
			
							if( file.size > 110000 ) {//~100Kb
								return false;
							}
						}
			
						return true;
					}
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
			
			
				////////////////////
				//change profile
				$('[data-toggle="buttons-radio"]').on('click', function(e){
					var target = $(e.target);
					var which = parseInt($.trim(target.text()));
					$('.user-profile').parent().hide();
					$('#user-profile-'+which).parent().show();
				});
			});
		</script>
	</body>
</html>