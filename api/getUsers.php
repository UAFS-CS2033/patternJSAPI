<?php 
   include_once "../models/UserDAO.php";

   $userDAO = new UserDAO();
   $users = $userDAO->getUsers();

   echo json_encode($users);
?>