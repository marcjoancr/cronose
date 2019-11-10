<?php

require 'Validator.php';

class User {

    private $username;
    private $password;
    private $valid = false;

    public function __constructor($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function isValid() {
        return $this->valid;
    }

    public function getUsername() {
        return $this->username; 
    }
    public function getPassword() {
        return $this->password;
    }

    public function validate() {
        if (Validator::isValid($this)) $this->valid = true;
    }

}