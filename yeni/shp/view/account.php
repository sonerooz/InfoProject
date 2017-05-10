<section><div class="container">
<div class="row">
		<!--PAGE CONTENT BEGINS-->
		<div >
					<div class="shop-details-tab">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#edit-basic">
									Genaral
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#edit-contact">
									Contact
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#edit-address">
									Address
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#edit-cardinfo">
									Card Info
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#edit-password">
									Password
								</a>
							</li>
						</ul>

						<div class="tab-content profile-edit-tab-content">
							<div id="edit-basic" class="tab-pane in active"><br />
								<h2 class="title text-center">General Information</h2>

								<div class="col-sm-12">
								
									<label class="col-md-12">Username</label>

									<div class="form-group col-md-6">
										<input class="form-control" readonly="" type="text" id="form-field-username" placeholder="Username" value="By.Kutlu" />
									</div>
								</div>

								<div class="col-sm-12">
									<label class="col-md-12">Name</label>
									<div class="form-group col-md-6">
										<input  class="form-control" type="text" id="form-field-first" placeholder="First Name" value="Osman" />
									</div>
									<div class="form-group col-md-6">
										<input  class="form-control" type="text" id="form-field-last" placeholder="Last Name" value="KUTLU" />
									</div>
								</div>
								<div class="col-sm-12">
									<label class="col-md-12" for="form-field-date">Birth Date</label>
									<div class="form-group col-md-6">
										<div class="input-append">
											<input class="form-control" id="form-field-date" type="date" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
											<span class="add-on">
												<i class="icon-calendar"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<label class="col-md-12">Gender</label>
									<div class="form-group col-md-6">
										<div class="space-2"></div>

										<label class="inline">
											<input class="form-control" name="form-field-radio" type="radio" />
											<span class="lbl"> Male</span>
										</label>
										&nbsp; &nbsp; &nbsp;
										<label class="inline">
											<input class="form-control" name="form-field-radio" type="radio" />
											<span class="lbl"> Female</span>
										</label>
									</div>
								</div>
								<center>
								<button class="btn btn-primary">
									Save
								</button>
								</center>
							</div>

							<div id="edit-contact" class="tab-pane">
								<br />
								<h2 class="title text-center">Contact Information</h2>

								<div class="col-sm-12">
									<label class="col-md-12" for="form-field-email">Email</label>

									<div class="form-group col-md-6">
											<input class="form-control" type="email" id="form-field-email" value="xxx@yyy.com" />
									</div>
								</div>

								<div class="col-sm-12">
									<label class="col-md-12" for="form-field-phone">Phone</label>

									<div class="form-group col-md-6">
											<input class="form-control" type="text" id="form-field-phone" value="(531) 860-XXXX" />
									</div>
								</div>
								<center>
								<button class="btn btn-primary">
									Save
								</button>
								</center>
							</div>
							<div id="edit-address" class="tab-pane">
								<br />
								
								<h2 class="title text-center">Address Information</h2>

								<div class="col-sm-12" style="background:#FFFFCC;border-style: dotted;border-width: large;border-color: gray;padding-top: 5px;padding-bottom: 5px;margin-top: 5px;margin-bottom: 5px;">
									<label class="col-md-12">#ID Address Name</label>

									<div class="col-sm-9">
										<div class="col-md-12">
											<strong>Country: </strong>Turkey 
											<strong>City: </strong>Kütahya
											<strong>Town: </strong>Tavşanlı <br />
											ABC Mah, CD sokak, No: 15
										</div>
									</div>
									<div class="col-sm-3">
									<button class="btn btn-default">
											Edit
									</button>
									</div>
								</div>
								<div class="col-sm-12" style="background:#FFFFCC;border-style: dotted;border-width: large;border-color: gray;padding-top: 5px;padding-bottom: 5px;margin-top: 5px;margin-bottom: 5px;">
									<label class="col-md-12">#ID Address Name</label>

									<div class="col-sm-9">
										<div class="col-md-12">
											<strong>Country: </strong>Turkey 
											<strong>City: </strong>Kütahya
											<strong>Town: </strong>Tavşanlı <br />
											ABC Mah, CD sokak, No: 15
										</div>
									</div>
									<div class="col-sm-3">
										<button class="btn btn-default">
											Edit
										</button>
									</div>
								</div>
								<div>
										<button class="btn btn-primary btn-block" >Add New Address</button>
								</div>
							</div>

							<div id="edit-cardinfo" class="tab-pane">
								<br />
								
								<h2 class="title text-center">Card Information</h2>
								
								<div class="col-sm-12" style="background:#FFFFCC;border-style: dotted;border-width: large;border-color: gray;padding-top: 5px;padding-bottom: 5px;margin-top: 5px;margin-bottom: 5px;">
									<label class="col-md-12">#ID Card Name</label>

									<div class="col-sm-9">
										<div class="col-md-12">
											<strong>Osman KUTLU</strong> <br />
											<strong>Card No: </strong>2222-3333-2222-2222 <br />
											<strong>Expiration date: </strong>12/21<br />
											<strong>CVC: </strong>222 <br />
											
										</div>
									</div>
									<div class="col-sm-3">
										<button class="btn btn-default">
											Edit
										</button>
									</div>
								</div>

								
								<div>
										<button class="btn btn-primary btn-block" >Add new Credit Card</button>
								</div>
							</div>
							
							<div id="edit-password" class="tab-pane">
								<br />
								<h2 class="title text-center">Password</h2>

								<div class="col-sm-12">
									<label class="col-md-12" for="form-field-pass1">New Password</label>

									<div class="form-group col-md-6">
										<input class="form-control" type="password" id="form-field-pass1" />
									</div>
								</div>

								<div class="col-sm-12">
									<label class="col-md-12" for="form-field-pass2">Confirm Password</label>

									<div class="form-group col-md-6">
										<input class="form-control" type="password" id="form-field-pass2" />
									</div>
								</div>
								
								<center>
								<button class="btn btn-primary">
									Save
								</button>
								</center>
							</div>
						</div>
						
					</div>

					
				</form>
		</div><!--/user-profile-->
	

		<!--PAGE CONTENT ENDS-->
		</div>
		</div>
</section>