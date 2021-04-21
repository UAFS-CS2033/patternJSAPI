<?php 
   include_once "../models/UserDAO.php";

   $userID = intval($_GET['id']);
   $userDAO = new UserDAO();
   $user = $userDAO->getUser($userID);

   echo json_encode($user);
?>