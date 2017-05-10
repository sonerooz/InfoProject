<?php
	class FCard {
		
		public static function getUserCards ($userID) {
			
			$db = new DB();
			$card = $db->getDataTable("CALL getCards($userID)");
			
			$allCards = array();
			
			while($row = $card->fetch_assoc()) {
				$cardObj = new Card($row["cardID"], $row["cardName"], $row["cardNo"], $row["expirationMonth"],$row["expirationYear"], $row["CVC"], $row["ownerName"], $row["ownerSurname"]);
				array_push($allCards, $cardObj);
			}
			
			return $allCards;
		}
	}
?>