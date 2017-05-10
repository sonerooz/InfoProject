<?php
	class ELog{
		public $user;	
		public $productID;
		public $action = "";
		public $date;
		
		
		function __construct($user, $productID, $action, $date){
			$this ->user = $user;
			$this ->productID = $productID;
			$this ->action = $action;
			$this ->date = $date;
		}
	}
?>