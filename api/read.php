<?php 

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Pesron.php';

   // Instantiate DB and connect
  $database = new Database();
  $db = $database->connect();

   // Initialize person object
  $person = new Person($db);

   // Person query
  $result = $person->read();

  // Get row count
  $num = $result->rowCount();

   // Check for any person
  if($num > 0) {

    // Person array
    $persons_arr = array();
    $persons_arr['data'] = array();

     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row); // extract data from each row

       $person_item = array(
        'id' => $id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'birth_date' => $birth_date,
        'mobile_num' => $mobile_num,
        'house_num' => $house_num,
        'work_num' => $work_num,
      );

      // Push to "data"
      array_push($persons_arr['data'], $person_item);
    }

    // Encode to JSON and output
    echo json_encode($persons_arr);
   } else {

    // No Person
    echo json_encode(
      array('message' => 'No person found!')
    );
  }
?>