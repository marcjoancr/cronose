<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Validator.php';

class User {

    private $username;
    private $password;
    private $valid = false;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->valid = Validator::isValid($this);
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

}
