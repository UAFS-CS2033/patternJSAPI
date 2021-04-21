<?php 
    include_once "../models/UserDAO.php";
   
    $user = new User();
    $user->setUsername($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setPasswd($_POST['passwd']);
    $user->setLastname($_POST['lastname']);
    $user->setFirstname($_POST['firstname']);
    $user->setUrole($_POST['urole']);
    $userDAO = new UserDAO();
    $userDAO->addUser($user);
?>