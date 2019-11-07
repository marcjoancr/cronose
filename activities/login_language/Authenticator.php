<?php
require 'db_connection.php';

class Authenticator {

    private static $index = '/';
    private static $login = '/login.php';

    public static function verify($user) {
        $_SESSION['verified'] = false;
        $username = $user[0];
        $password = $user[1];
        if (empty($user[0]) || empty($user[1])) return;
        $result = DB::selectUser($username);
        if (empty($result)) return;
        if (!password_verify($password, $result[0][1])) return;
        $_SESSION['verified'] = true;
    }

    public static function redirect() {
        if (!isset($_SESSION['verified'])) header('Location: login.php');
        if ($_SERVER['REQUEST_URI'] == self::$index) {
            if (!$_SESSION['verified']) header('Location: login.php');
        }
        if ($_SERVER['REQUEST_URI'] == self::$login) {
            if ($_SESSION['verified']) header('Location: index.php');
        }
    }

}