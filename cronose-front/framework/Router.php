<?php

  require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

  class Router {

    public static function get($url, $view, $function = null) {
      $r_base = explode('/', $_SERVER['REQUEST_URI'])[1];
      $u_base = explode('/', $url)[1];
      if ($r_base != $u_base) return;
      $r_params = array_slice(explode('/', $_SERVER['REQUEST_URI']), 2);
      $u_params = array_slice(explode('/', $url), 2);
      if ($function != null) $map = Router::callParamFunction($function, $r_params);

      $map['url'] = $url;
      $map['view'] = $view;
      Router::view($map);
    }

    public static function redirect($url) {
      Router::view(array('view' => $url));
    }

    private static function view($map) {
      $data = $map['data'] ?? '';
      include './views/'.$map['view'].'.php';
      die();
    }

    private static function callParamFunction($function, $params) {
      $exploded = explode('::', $function);
      $exploded[1] = explode('(', $exploded[1])[0];
      return $params ? call_user_func(array($exploded[0], $exploded[1]), $params[0]) : call_user_func(array($exploded[0], $exploded[1]));
    }
  }


