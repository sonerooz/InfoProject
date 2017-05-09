<?php
	class ECategory {
		public $catID;
		public $catName;
		public $parentID;
		public $properties;
		
		public function ECategory($catID,$catName,$parentID,$properties){
			$this->$catID       =$catID;
			$this->$catName     =$catName;
			$this->$parentID    =$parentID;
			$this->$properties  =$properties;
		}
	}

?>