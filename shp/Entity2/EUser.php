<?php
	class User{
		public $userID = "1";	
		public $userName = "";
		public $password = "";
		public $name = "";	
		public $surname = "";
		public $identification = "";
		public $phoneNumber = "";
		public $email = "";
		public $userType = 1;
		public $cards;
		public $addresses;
		
		
		function __construct($userID, $userName, $password, $name, $surname, $identification, $phoneNumber, $userType, $email, $cards, $addresses){
			$this -> userID = $userID;
			$this -> userName = $userName;
			$this -> password = $password;
			$this -> name = $name;
			$this -> surname = $surname;
			$this -> identification = $identification;
			$this -> phoneNumber = $phoneNumber;
			$this -> email = $email;
			$this -> userType = $userType;
			$this -> cards = $cards;
			$this -> addresses = $addresses;
		}
	}
?>