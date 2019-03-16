<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Person.php';

  // Initialize DB and connect
  $database = new Database();
  $db = $database->connect();

  // Initialize person object
  $person = new Person($db);

  // Get keywords
  $keywords = isset($_GET['input']) ? $_GET['input'] : die(); // GET if a person info is set; else = cuts everything and don't display anything

  // Person query
  $result = $person->search($keywords);

  // Get row count
  $num = $result->rowCount();

  // Check for any person
  if($num > 0) {

    // Person array
    $persons_arr = array();
    $persons_arr['results'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row); // extract data from each row

      // Create array
      $person_item = array(
        'id' => $person->id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'birth_date' => $birth_date,
        'mobile_num' => $mobile_num,
        'house_num' => $house_num,
        'work_num' => $work_num
      );

      // Push to "data"
      array_push($persons_arr['results'], $person_item);
    }

    // Encode to JSON and output
    echo json_encode($persons_arr);
  } else {
 
    // No Person
    echo json_encode(
      array("message" => "No person found!")
    );
  }
?>