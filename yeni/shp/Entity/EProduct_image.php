<?php
	class product_image {
		public $productID;
		public $url;
		public $main;
	
		function product_image($productID, $url, $main){
			$this -> $productID = $productID;
			$this -> $url = $url;
			$this -> $main = $main;
		}
	}
?>