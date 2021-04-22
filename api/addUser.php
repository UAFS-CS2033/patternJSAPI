<?php
   
    include_once "../models/UserDAO.php";

    //Set Response Header
    header("Content-Type: application/json");
    //Read the JSON Payload from the Post Request and convert to associative array
    $data = json_decode(file_get_contents("php://input"),true);

    //Create User and Populate from Associative Array
    $user = new User();
    $user->setEmail($data['email']);
    $user->setFirstname($data['firstname']);
    $user->setLastname($data['lastname']);
    $user->setUsername($data['username']);
    $user->setPasswd($data['passwd']);
    $user->setUrole($data['urole']);
   
    //Add the User and then Get the User
    $userDAO = new UserDAO();
    $id=$userDAO->addUser($user);
    $result=$userDAO->getUser($id);
  
    //Return the User Record in JSON Format in the Response
    echo json_encode($result);

?>