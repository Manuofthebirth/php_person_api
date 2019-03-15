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

  // Get ID
  $person->id = isset($_GET['id']) ? $_GET['id'] : die(); // GET if person is set and put on person id; else = cuts everything and don't display anything

  // Get person
  $person->read_single();

  // Create array
  $person_arr = array(
    'id' => $person->id,
    'first_name' => $person->first_name,
    'last_name' => $person->last_name,
    'birth_date' => $person->birth_date,
    'mobile_num' => $person->mobile_num,
    'house_num' => $person->house_num,
    'work_num' => $person->work_num
  );

  // Encode to JSON
  print_r(json_encode($person_arr)); // Print a readable info about the variables

?>