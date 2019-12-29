<?php

require_once 'Model.php';

class ArticleModel extends Model {

  public function __construct($title, $content, $author, $published) {
    $this->schema = array(
      'title' => $title,
      'content' => $content,
      'author' => $author,
      'published' => $published
    );
    parent::__construct();
  }

}
