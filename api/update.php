<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Pesron.php';

  // Initialize DB and connect
  $database = new Database();
  $db = $database->connect();

  // Initialize person object
  $person = new Person($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $person->id = $data->id;

  $person->first_name = $data->first_name;
  $person->last_name = $data->last_name;
  $person->birth_date = $data->birth_date;
  $person->description = $data->description;
  $person->house_num = $data->house_num;
  $person->work_num = $data->work_num;


  // Update a person
  if($person->update()) {
    echo json_encode(
      array('message' => 'New Person updated!')
    )
  } else {
    echo json_encode(
      array('message' => 'Unable to update new Person!')
    )
  }

?>