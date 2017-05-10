<?php
	class FUser {
		
		public static function getUsers ($word) {
			$db = new DB();
			$result = $db->getDataTable("CALL getUsers('".$word."')");
			
			$allUsers = array();
			
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row["userID"], $row["userName"], /*null*/$row["password"], $row["name"], $row["surname"], $row["identification"], $row["birthday"],$row["gender"],$row["phoneNumber"], $row["userType"], $row["email"], null, null);
				array_push($allUsers, $userObj);
			}
			
			return $allUsers;
		}
		
		public static function getUser ($userID) {
						
			$allAddress = FAddress::getUserAddresses($userID);
			$allCards = FCard::getUserCards($userID);
			
			$db = new DB();
			$result = $db->getDataTable("CALL getUser($userID)");
			$row = $result->fetch_assoc();
			$userObj = new User($row["userID"], $row["userName"], /*null*/$row["password"], $row["name"], $row["surname"], $row["identification"], $row["birthday"],$row["gender"], $row["phoneNumber"], $row["userType"], $row["email"], $allCards, $allAddress);
			return $userObj;
		}
		public static function insertUser($userName,$password,$name,$surname,$identification,$birthday,$gender, $phoneNumber,$email) {
			$db = new DB();
			$success = $db->executeQuery("CALL insertUser('$userName','$password','$name','$surname','$identification','$birthday','$gender', '$phoneNumber','1','$email')");
			return $success;
		}
		
		public static function insertNewUser($userName,$password,$name,$surname,$identification, $phoneNumber) {
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO users(userName, password, name, surname, identification, phoneNumber, userType) VALUES ('$userName', '$password', '$name', '$surname', '$identification', 1,'$phoneNumber')");
			return $success;
		}
		
		public static function loginUser($userName,$password) {
			$db = new DB();
			$customer = $db->getDataTable("CALL loginUser('$userName','$password')");
			$customer = $customer->fetch_assoc();
			return $customer;
		}
		
		public static function changeUserPassword($userID, $pass) {
			//echo "UPDATE users SET password = '$pass' WHERE userID = $userID";
			$db = new DB();
			$success = $db->executeQuery("CALL updatePassword($userID, '$pass')");
			return $success;
		}
		
		public static function changeUserBasicInfo($userID, $name, $surname, $gender, $email, $phone) {
			if($email != null && $email != "" && $email != " ")
				$email = "'$email'";
			else
				$email = "NULL";
			if($phone != null  && $phone != "" && $phone != " ")
				$phone = "'$phone'";
			else
				$phone = "NULL";
			$q= "CALL updateUserBasicInfo($userID, '$name', '$surname', '$gender', $email, $phone)";
			
			$db = new DB();
			$success = $db->executeQuery($q);
			return $success;
		}
	}
?>