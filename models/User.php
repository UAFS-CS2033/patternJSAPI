<?php
    class User implements JsonSerializable{
        private $userID;
        private $username;
        private $email;
        private $passwd;
        private $lastname;
        private $firstname;
        private $urole;

        public function load($row){
            $this->setUserID($row['userID']);
            $this->setUsername($row['username']);
            $this->setEmail($row["email"]);
            $this->setPasswd($row["passwd"]);
            $this->setLastname($row['lastname']);
            $this->setFirstname($row['firstname']);
            $this->setUrole($row['urole']);
        }

        public function setUserID($userID){
            $this->userID=$userID;
        }

        public function getUserID(){
            return $this->userID;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPasswd($passwd){
            $this->passwd=$passwd;
        }

        public function getPasswd(){
            return $this->passwd;
        }

        public function setLastname($lastname){
            $this->lastname=$lastname;
        }

        public function getLastname(){
            return $this->lastname;
        }

        public function setFirstname($firstname){
            $this->firstname=$firstname;
        }

        public function getFirstname(){
            return $this->firstname;
        }

        public function setUrole($urole){
            $this->urole=$urole;
        }

        public function getUrole(){
            return $this->urole;
        }

        public function jsonSerialize(){
            return array(
                'userID' => $this->userID,
                'lastname'=> $this->lastname,
                'firstname' => $this->firstname,
                'username' => $this->username,
                'passwd' => $this->passwd,
                'email' => $this->email,
                'urole' => $this->urole
            );
        }
    }
?>