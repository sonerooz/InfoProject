<?php
	
			require_once("../Connection/system.php");
	require_once(URL."/Facade/Facade.php");
	$result = "baş";
	if(isset( $_POST['function'] ) && $_POST['function'] == "changePassword" ) {
		 $fuser = new FUser();
		 if(isset( $_POST['userID'] ) && isset($_POST['pass']))
		 {
			 $result = FUser::changeUserPassword($_POST['userID'], $_POST['pass']);
		 }
		 else
			 $result = "hata";
		 
	}
	
	else if(isset( $_POST['function'] ) && $_POST['function'] == "change-user-basic-info" ) 
	{
		$result = "girdi";
		$fuser = new FUser();
		 if(isset( $_POST['userID'] ) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender']) && isset($_POST['email'])  && isset($_POST['phone']))
		 {
			 $result = FUser::changeUserBasicInfo($_POST['userID'], $_POST['name'], $_POST['surname'], $_POST['gender'] , $_POST['email'] , $_POST['phone']);
		 }
		 else
			 $result = "hata";
		 
	}

	echo $result;


?>