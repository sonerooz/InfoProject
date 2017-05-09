<?php
	public class EProduct {
		public $productID;
		public $catID;
		public $productName;
		public $price;
		public $desctiption;
		public $stock;
		public $images;
		public $properties;
		
		public function EProduct($productID,$catID,$productName,$price,$desctiption,$stock,$images,$properties){
			$this->$productID=$productID
			$this->$catID=$catID;
			$this->$productName  =$productName;
			$this->$price  =$price;
			$this->$desctiption=$desctiption;
			$this->$stock=$stock;
			$this->$images=$images;
			$this->$properties=$properties;
		}
	}

?>