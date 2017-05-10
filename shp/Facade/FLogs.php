<?php
	class FLogs {
		
		public static function getLogs () {
			$db = new DB();
			$result = $db->getDataTable("CALL getLogs()");
			
			$allLogs = array();
			
			while($row = $result->fetch_assoc()) {
				$user = new User($row["userID"], $row["userName"], null, null, null, null, null,null, null, null, null, null, null);
				$eLog = new ELog($user, $row["productID"], $row["activities"], $row["date"]);
				array_push($allLogs, $eLog);
			}
			
			return $allLogs;
		}
		
	}
?>