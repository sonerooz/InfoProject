<?php
	class Card {
		public $cardID;
		public $cardName;
		public $cardNo;
		public $expirationMonth;
		public $expirationYear;
		public $CVC;
		public $ownerName;
		public $ownerSurname;
		
		function __construct($cardID, $cardName, $cardNo, $expirationMonth, $expirationYear, $CVC, $ownerName, $ownerSurname){
			$this->cardID        =$cardID;
			$this->cardName      =$cardName;
			$this->cardNo        =$cardNo;
			$this->expirationMonth=$expirationMonth;
			$this->expirationYear=$expirationYear;
			$this->CVC           =$CVC;
			$this->ownerName     =$ownerName;
			$this->ownerSurname  =$ownerSurname;
		}
	}

?>