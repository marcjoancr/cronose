<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Validator.php';

class User {

    private $username;
    private $email;
    private $password;
    private $valid = false;

    public function __construct($username, $password, $email = '') {
        $this->username = $username;
        $this->password = $password;
        $this->valid = Validator::isValid($this);
        if ($this->valid) {
            $this->email = DB::getEmailByUsername($this->username);
        } else {
            $this->email = $email;
        }
    }

    public function isValid() {
        return $this->valid;
    }
    public function validate() {
        $this->valid = Validator::isValid($this);
    }

    public function getUsername() {
        return $this->username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }

}
