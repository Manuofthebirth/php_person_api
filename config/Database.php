<?php
	class Database {
		// DB params
		private $host = 'localhost';
		private $db_name = 'contactlist'; 
		private $username = 'root'; // insert your username here (MySQL default: 'root')
		private $password = 'mysql'; // insert your password here (MySQL default: '')
		private $conn;

		// DB Connect
		public function connect() {
			
			$this->conn = null;

			try {
				$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $exception) {
				echo 'Connection Error: ' . $exception->getMessage(); 
			}

			return $this->conn;
		}
	}
?>
