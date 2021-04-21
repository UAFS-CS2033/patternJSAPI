<?php
    include_once "../models/UserDAO.php";

    header("Content-Type: application/json");
    $data = json_decode(file_get_contents("php://input"));
    $data['userID']=null;
    
    $user = new User();
    $user->load($data);
    $userDAO = new UserDAO();
    $userDAO->addUser($user);
     
    
    echo json_encode($data);

?>