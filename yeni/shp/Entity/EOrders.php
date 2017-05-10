<?php
	class Order {
		public $orderID;
		public $user;
		public $totalPrice;
		public $date;
		public $address;
		public $cardID;
		public $products;
		
		function __construct($orderID,$user,$totalPrice,$date,$address,$cardID){
			$this->orderID	=$orderID;
			$this->user		=$user;
			$this->totalPrice =$totalPrice;
			$this->date  	=$date;
			$this->address  =$address;
			$this->cardID	=$cardID;
		}
	}
?>
