<?php

require_once '../models/Chat.model.php';

class ChatController {

  public static function getChat($sender, $reciver) {
    $offers = ChatModel::getChat($sender, $reciver);
    return json_encode($offers);
  }

  public static function sendMSG($sender, $reciver, $msg) {
    $offers = ChatModel::sendMSG($sender, $reciver, $msg);
    return json_encode($offers);
  }

}
