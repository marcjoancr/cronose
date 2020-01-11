<?php

require_once 'Model.php';
require_once '../dao/Chat.dao.php';

class ChatModel extends Model {

  public static function getChat($sender, $reciver) {
    return ChatDAO::getChat($sender, $reciver);
  }

  public static function sendMSG($sender, $reciver, $msg) {
    return ChatDAO::sendMSG($sender, $reciver, $msg);
  }

}