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

		// Get (read) Table data
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

		// Get single person
		public function read_single() {

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
			WHERE
				id = ?
			LIMIT 0,1";

			// Prepare statement
			$stmt = $this->conn->prepare($query);

			// Bind ID from a person
			$stmt->bindParam(1, $this->id);

			// Execute query
			$stmt->execute(); 

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// Set properties
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->birth_date = $row['birth_date'];
			$this->mobile_num = $row['mobile_num'];
			$this->house_num = $row['house_num'];
			$this->work_num = $row['work_num'];

			return $stmt;
		}
	}
?>