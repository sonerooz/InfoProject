<?php
	class EOrder_product {
		public $orderID;
		public $productID;
		public $amount;
		public $price;
		
		function __construct($orderID,$productID,$amount, $price){
			$this->orderID	=$orderID;
			$this->productID=$productID;
			$this->amount	=$amount;
			$this->price	=$price;
		}
	}

?>