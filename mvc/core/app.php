<?php

$path = '/';
if (isset($_GET['__url']))
  $path = parsePath($_GET['__url']);

$route = getController($path);

$controller = DEFAULT_CONTROLLER;
$params = [];

if (isset($route)) {
  $controller = $route['controller'];
  $params = $route['params'];
}

controller($controller, $params);
