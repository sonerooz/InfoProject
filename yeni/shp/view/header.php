<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/font-awesome.min.css" rel="stylesheet">
    <link href="view/css/prettyPhoto.css" rel="stylesheet">
    <link href="view/css/animate.css" rel="stylesheet">
	<link href="view/css/main.css" rel="stylesheet">
	<link href="view/css/responsive.css" rel="stylesheet">
		<link href="AP/view/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="view/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="view/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="view/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="view/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="view/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/shp/"><img src="view/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><?php
										if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==true){
											echo "Welcome {$_SESSION['name']} {$_SESSION['surname']}&nbsp; &nbsp; &nbsp;";
										}
									?>
								</li>
								<li><a href="?type=account"><i class="fa fa-user"></i> Account</a></li>
								<!--<li><a href="#"><i class="fa fa-star"></i> Address</a></li>-->
								<!--<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
								<li><a href="?type=basket"><i class="fa fa-shopping-cart"></i> Basket</a></li>
								<li>
									<?php if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==true){
											echo '<a href="?type=logout"><i class="fa fa-lock"></i>Logout</a>';
										}
										else{
											echo '<a href="?type=login"><i class="fa fa-lock"></i>Login</a>';
										}
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	<br><br>

	</header><!--/header-->
