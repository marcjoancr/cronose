<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/models/User.model.php';

class ProfileController
{
  public function getProfile($user) {
    $profile = UserModel::getUserProfile($user);
    return array(
      'user' => $profile
      
    );
  }



}