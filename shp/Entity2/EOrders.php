<?php
	class Order {
		public $orderID;
		public $userID;
		public $totalPrice;
		public $date;
		public $addressID;
		public $cardID;
		public $products;
		
		function __construct($orderID,$userID,$totalPrice,$date,$addressID,$cardID){
			$this->orderID	=$orderID
			$this->userID	=$userID;
			$this->totalPrice =$totalPrice;
			$this->date  	=$date;
			$this->addressID=$addressID;
			$this->cardID	=$cardID;
		}
	}

?>