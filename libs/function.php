<?php 

	class Members {
		public $conn;
		public function __construct() {
			$this -> conn = new mysqli('localhost','root','','crud_oop');
		}


		public function insertMember($name, $uname, $email, $contact) {
			$sql = "INSERT INTO members_info (name,	username,	email,	contact_no) VALUES ('$name','$uname','$email','$contact')";
			$data = $this -> conn -> query($sql);

			if ($data) {
				# code...
				return true;
			} else {
				# code...
				return false;
			}
			
		}

		public function bringAllData() {
			$sql = "SELECT * FROM members_info";
			$data = $this -> conn -> query($sql);
			return $data; 
		}

		public function checkEmail($email) {
			$sql = "SELECT * FROM members_info WHERE email='$email' ";
			$data = $this -> conn -> query($sql);
			$email_count = $data -> num_rows;
			if ($email_count > 0) {
				# code...
				return false;
			} else {
				# code...
				return true;
			}
			
		}

		public function dataDelete($ID) {
			$sql = "DELETE FROM members_info WHERE members_id='$ID' ";
			$data = $this -> conn -> query ($sql);

			if ($data) {
				# code...
				return true;
			} else {
				# code...
				return false;
			}
			
		} 
	}



 ?>