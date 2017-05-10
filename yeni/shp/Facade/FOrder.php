<?php
	class FOrder {
		
		public static function getOrders () {
			$db = new DB();
			$result = $db->getDataTable("CALL getOrders()");
			
			$allOrders = array();
			
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row["userID"], $row["userName"], '' ,$row["name"], $row["surname"], null, null, null, null, null, null, null, null); 
				$addressObj = new Address($row["addressID"],null, $row["country"],$row["city"],$row["town"],'x'); 
				$orderObj = new Order($row["orderID"], $userObj, $row["totalPrice"], $row["date"], $addressObj , $row["cardID"]);
				array_push($allOrders, $orderObj);
			}
			
			return $allOrders;
		}
		
		public static function getOrder ($id) {
			$db = new DB();
			$order = $db->getDataTable("getOrder");
			$orderObj = new Order($row["orderID"], $row["userID"], $row["totalPrice"], $row["date"], $row["addressID"], $row["cardID"]);
			
			/*
				$products = array();
				
				servisle productlar çekilir
				
				$orderObj->products = $products
			*/
			return $orderObj;
		}
		
		/*Boþ*/
		public static function insertNewOrder(/**/) {
			$db = new DB();
			$success = $db->executeQuery(/**/);
			return $success;
		}
	}
?>