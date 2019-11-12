<?php

  function connectToDb(){
    try {
      return new PDO('mysql:host=127.0.0.1;dbname=pruebas','admin','cronose');
    } catch (PDOException $e){
      die($e->getMessage());
    }
  }

  function fecthAllTasks($pdo){
    $statement = $pdo -> prepare('select * from services');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS,'services');
  }

  function dd($data){
    echo'<pre>';
    die(var_dump($data));
    echo'</pre>';
  }

