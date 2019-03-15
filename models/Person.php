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


    // Get people by name
    public function search() {

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
        first_name = ?";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind name from a person
      $stmt->bindParam(':first_name', $this->first_name);

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


    // Create Person
    public function create() {

      // Create query
      $query = "INSERT INTO ' . $this->table . ' 
        SET
          first_name = :first_name,
          last_name = :last_name,
          birth_date = :birth_date,
          mobile_num = :mobile_num,
          house_num = :house_num,
          work_num = :work_num";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->first_name=htmlspecialchars(strip_tags($this->first_name));
      $this->last_name=htmlspecialchars(strip_tags($this->last_name));
      $this->birth_date=htmlspecialchars(strip_tags($this->birth_date));
      $this->description=htmlspecialchars(strip_tags($this->description));
      $this->house_num=htmlspecialchars(strip_tags($this->house_num));
      $this->work_num=htmlspecialchars(strip_tags($this->work_num));

      // Bind data
      $stmt->bindParam(':first_name', $this->first_name);
      $stmt->bindParam(':last_name', $this->last_name);
      $stmt->bindParam(':birth_date', $this->birth_date);
      $stmt->bindParam(':mobile_num', $this->mobile_num);
      $stmt->bindParam(':house_num', $this->house_num);
      $stmt->bindParam(':work_num', $this->work_num);

      // Execute query and print error
      if($stmt->execute()) {
        return true;
      } 

      printf("Error: %s.\n", $stmt->error);

      return false;
    }


    // Update Person
    public function update() {

      // Create query
      $query = "UPDATE ' . $this->table . ' 
        SET
          first_name = :first_name,
          last_name = :last_name,
          birth_date = :birth_date,
          mobile_num = :mobile_num,
          house_num = :house_num,
          work_num = :work_num
        WHERE
          id = :id";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id=htmlspecialchars(strip_tags($this->id));
      $this->first_name=htmlspecialchars(strip_tags($this->first_name));
      $this->last_name=htmlspecialchars(strip_tags($this->last_name));
      $this->birth_date=htmlspecialchars(strip_tags($this->birth_date));
      $this->description=htmlspecialchars(strip_tags($this->description));
      $this->house_num=htmlspecialchars(strip_tags($this->house_num));
      $this->work_num=htmlspecialchars(strip_tags($this->work_num));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':first_name', $this->first_name);
      $stmt->bindParam(':last_name', $this->last_name);
      $stmt->bindParam(':birth_date', $this->birth_date);
      $stmt->bindParam(':mobile_num', $this->mobile_num);
      $stmt->bindParam(':house_num', $this->house_num);
      $stmt->bindParam(':work_num', $this->work_num);

      // Execute query
      if($stmt->execute()) {
        return true;
      } 

      // Print error
      printf("Error: %s.\n", $stmt->error); 

      return false;
    }
      

    // Delete Person
    public function delete() {

      // Create query
      $query = "DELETE FROM ' . $this->table . ' WHERE id = :id";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean id data
      $this->id=htmlspecialchars(strip_tags($this->id));

      // Bind id data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      } 

      // Print error
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }
?>