<?php
	
	class Address {
		
		public $addressID;
		public $addressName;
		public $country;
		public $city;
		public $town;
		public $detail;
		
		function __construct($addressID,$addressName, $country,$city,$town,$detail){
			
			$this->addressID   =$addressID;
			$this->addressName =$addressName; 
			$this->country     =$country;
			$this->city        =$city;
			$this->town        =$town;
			$this->detail	   =$detail;
		}
	}
?>
