<?php

require_once 'DAO.php';

class ChatDAO extends DAO {

  public static function showChat($sender, $reciver) {
    $sql = "select sender_dni,receiver_dni,(select name from User where sender_dni = dni) as name,sended_date,message from Message
where (sender_dni = '" . $sender . "' and receiver_dni = '" . $reciver . "') or (sender_dni = '" . $reciver . "' and receiver_dni = '" . $sender . "') order by sended_date;";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function sendMSG($sender, $reciver, $msg) {
    $sql = "insert into Message value('$sender', '$reciver', now(), '$msg');";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}
