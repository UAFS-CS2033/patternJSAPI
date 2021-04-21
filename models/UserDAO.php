<?php
    include_once 'User.php';

    class UserDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "mvcuser", "mvcpass", "patternMVCAuth");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addUser($user){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO users (username, lastname, firstname, email, passwd, urole) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $user->getUsername(), $user->getLastname(), $user->getFirstname(), $user->getEmail(), $user->getPasswd(), $user->getUrole());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteUser($userid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $user = new User();
                $user->load($row);
                $users[]=$user;
            }    
            $stmt->close();
            $connection->close();
            return $users;
        }

        public function getUser($userid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userID = ?;"); 
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()){
                $user = new User();
                $user->load($row);
            }    
            $stmt->close();
            $connection->close();
            return $user;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }



    }
?>
