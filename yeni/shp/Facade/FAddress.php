<?php
	class FAddress {
		
		public static function addNewAddress ($userID, $addressName, $country, $city, $town, $detail) {
			$db = new DB();
			$result = $db->getDataTable("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'address'"); //en son kaydýn id'sini yazdýrdýk.
			$row = $result->fetch_assoc();
			$id = (int)($row["auto_increment"]);
			$result = $db->executeQuery("CALL insertNewAddress($userID, $id ,'$addressName', '$country', '$city', '$town', '$detail')");
				
		}
		
		public static function getUserAddresses ($userID) {
			$db = new DB();
			$address = $db->getDataTable("CALL getAddresses($userID)");
			$allAddress = array();
			
			while($row = $address->fetch_assoc()) {
				$addressObj = new Address($row["addressID"], $row["addressName"], $row["country"], $row["city"], $row["town"], $row["detail"]);
				array_push($allAddress, $addressObj);
			}
			
			return $allAddress;
		}
		
		public static function updateAddress ($adressID,$addressName, $country, $city, $town, $detail) {
			$db = new DB();
			$success = $db->executeQuery("CALL updateAddress($adressID, $addressName, $country, $city, $town, $detail)");
			return $success;
		}
		
		public static function deleteAddress ($adressID) {
			$db = new DB();
			$success = $db->executeQuery("CALL deleteAddress($adressID)");
			return $success;
		}
		
	}
?>