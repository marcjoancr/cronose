<?php

require_once 'Model.php';

class UserModel extends Model {

    private $username;
    private $email;
    private $password;
    private $valid = false;

    public function __construct($username, $password, $email = '') {
        $this->username = $username;
        $this->password = $password;
        $this->valid = UserController::isValid($this);
        if ($this->valid) {
            // $this->email = DB::getEmailByUsername($this->username);
        } else {
            // $this->email = $email;
        }
    }

    public function isValid() {
        return $this->valid;
    }
    public function validate() {
        $this->valid = UserController::isValid($this);
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

  public static function getById($dni) {
    return self::getUsernameByDNI($dni);
  }

  public static function getUserByUsername($username) {
    $sql = "SELECT * FROM User WHERE name = '" . $username . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }

  public static function getUsernameByDNI($dni) {
    $sql = "SELECT name FROM User WHERE dni = '" . $dni . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }


}
