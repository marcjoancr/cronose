<?php

  require_once './framework/Router.php';

  Router::get('/', 'home');

  require './routes/routes.php';

  Router::redirect('/404');
