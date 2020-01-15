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
    $sql = "select User.name,User.initials,User.tag from User,Message where User.id = sender_id and receiver_id = ${reciver} group by sender_id;";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}
