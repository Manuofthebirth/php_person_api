<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Person.php';

  // Initialize DB and connect
  $database = new Database();
  $db = $database->connect();

  // Initialize person object
  $person = new Person($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to delete
  $person->id = $data->id;

  // Delete a person
  if($person->delete()) {
    echo json_encode(
      array('message' => 'Person deleted!')
    );
  } else {
    echo json_encode(
      array('message' => 'Unable to delete Person!')
    );
  }

?>