<?php

require 'DB.php';

class Validator {

    private static function isValid($user) {
        if (!($user instanceof User)) return false; 
        $result = DB::selectUser($user::getUsername());
        if (!$result) return false;
        if (password_verify($user::getPassword())) return false;
        return true;
    }

}