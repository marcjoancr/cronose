<?php

require 'Validator.php';

class User {

    private $username;
    private $password;
    private $valid = false;

    public function __constructor($username, $password) {
        self::$username = $username;
        self::$password = $password;
    }

    public function isValid() {
        return self::$valid;
    }

    public function getUsername() {
        return self::$username;
    }
    public function getPassword() {
        return self::$password;
    }

    public function validate() {
        if (Validator::isValid(self)) self::$valid = true;
    }

}