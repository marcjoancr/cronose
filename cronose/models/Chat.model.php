<?php

require_once 'Model.php';
require_once '../dao/Chat.dao.php';

class ChatModel extends Model {

  public static function showChat($sender, $reciver) {
    return ChatDAO::showChat($sender, $reciver);
  }

  public static function sendMSG($sender, $reciver, $msg) {
    return ChatDAO::sendMSG($sender, $reciver, $msg);
  }

	public static function showChats($reciver) {
    return ChatDAO::showChats($reciver);
  }

}
