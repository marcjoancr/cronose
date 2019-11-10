<?php

require 'DB.php';

class Validator {

    public static function isValid($user) {
        if (!($user instanceof User)) return false;
        $result = DB::selectUserByUsername($user->getUsername());
        if (!$result) return false;
        if (!password_verify($user->getPassword(), $result[0][1])) return false;
        return true;
    }

}
