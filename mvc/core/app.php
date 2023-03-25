<?php

namespace Core;

use Error;

Database::init();

$path = '/';
if (isset($_GET['__url']))
  $path = parsePath($_GET['__url']);

$route = getController($path);

$controller = DEFAULT_CONTROLLER;
$method = DEFAULT_METHOD;
$params = [];

if (isset($route)) {
  $controller = 'Controllers\\' . $route['controller'];
  $method = $route['method'];
  $params = $route['params'];
}

if (!method_exists($controller, $method)) {
  throw new Error("Tidak ada method $method dalam controller $controller");
} else {
  $controller::$method($params);
}
