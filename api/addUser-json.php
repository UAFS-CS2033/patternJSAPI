<?php 
    header("Content-Type: application/json");

    $data = json_decode(file_get_contents("php://input"));
    echo $data->firstname;
    echo $data->lastname;

    echo json_encode($data);

?>