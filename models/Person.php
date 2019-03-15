<?php
	class Person {
		// DB 
		private $conn;
		private $table = 'persons';

		// Class Properties
		public $id;
		public $first_name;
		public $last_name;
		public $birth_date;
		public $mobile_num;
		public $house_num;
		public $work_num;
		public $created_at;

		// Constructor with DB
		public function __construct($db) {
			$this->conn = $db;
		}

		// GET (read) Table data
		public function read() {

			// Create query
			$query = "SELECT 
					id,
					first_name,
					last_name,
					birth_date,
					mobile_num,
					house_num,
					work_num,
					created_at
			FROM
				' . $this->table . '
			ORDER BY
				created_at DESC";

			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Execute query
			$stmt->execute(); 

			return $stmt;
		}
	}
?>