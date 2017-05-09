<?php
	class FAddress {
		
		public static function addNewAddress ($userID, $addressName, $country, $city, $town, $detail) {
			$db = new DB();
			$result = $db->getDataTable("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'address'"); //en son kaydýn id'sini yazdýrdýk.
			$row = $result->fetch_assoc();
			$id = (int)($row["auto_increment"]);
			$result = $db->executeQuery("CALL insertNewAddress($userID, $id ,'$addressName', '$country', '$city', '$town', '$detail')");
				
		}
		
	}
?>