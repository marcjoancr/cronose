<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/Logger.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Article.model.php';

$article = new ArticleModel("Adios","Merol","Tomeu",0);
//$article->save();
$prueba = json_encode(["title" => "Adios2"]);
$article->updateById(10, $prueba );

?>