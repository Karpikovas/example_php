<?php

function __autoload($class_name)
{

  $array_paths = array(
      '/models/',
      '/components/',
      '/controllers/'
  );

  foreach ($array_paths as $path) {
    $path = ROOT . $path . $class_name . '.php';
    if (is_file($path)) {
      require_once $path;
    }
  }
}

spl_autoload_register('__autoload');
