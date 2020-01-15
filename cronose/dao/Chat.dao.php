<?php

require_once 'DAO.php';

class ChatDAO extends DAO {

  public static function showChat($sender, $reciver) {
    $sql = "select sender_id,receiver_id,(select name from User where sender_id = id) as name,sended_date,message from Message
where (sender_id = '" . $sender . "' and receiver_id = '" . $reciver . "') or (sender_id = '" . $reciver . "' and receiver_id = '" . $sender . "') order by sended_date;";
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

  public static function showChats($reciver) {
    // return $reciver;
    $sql = "select User.name,message,Message.sended_date from Message,User where Message.sender_dni = User.dni and receiver_dni = '" . $reciver . "' group by name;";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

}
