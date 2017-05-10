<?php
require_once "view/header.php";
if(isset($_GET["type"])){
	switch ($_GET["type"]){
	case "product":
		require_once "view/product.php";

	break;

	case "category":
		require_once "view/category.php";
	break;

	case "basket":
		if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==true){
			require_once "view/basket.php";
		}
		else{
			header ("Location: http://localhost:81/shp?type=login");
		}
	break;

	case "login":
		require_once "view/login.php";

	break;
	
	case "logout":
		session_destroy();
		header ("Location: http://localhost:81/shp");
	break;

	case "checkout":
		if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==true){
			require_once "view/basket.php";
		}
		else{
			header ("Location: http://localhost:81/shp?type=login");
		}
	break;

	case "account":
		if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==true){
			require_once "view/account.php";
		}
		else{
			header ("Location: http://localhost:81/shp?type=login");
		}
	break;

	case "contact":
			require_once "view/contact.php";
	break;

	default:
		require_once "view/main.php";}
}
else{
	require_once "view/main.php";
}


require_once "view/footer.php";
?>