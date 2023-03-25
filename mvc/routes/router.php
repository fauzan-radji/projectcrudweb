<?php

require_once 'routes.php';

function parsePath($path)
{
  return '/' . rtrim($path, '/');
}

function getController($path)
{
  foreach (ROUTES as $route => $controller) {
    $regex = '#^' . preg_replace('/\{\w+\}/', '(\w+)', $route) . '$#i';
    if (!preg_match($regex, $path, $matches)) continue;

    $regex = str_replace('(\w+)', '\{(\w+)\}', $regex);
    preg_match($regex, $route, $keys);

    array_shift($matches);
    array_shift($keys);

    return [
      'controller' => $controller,
      'params' => array_combine($keys, $matches)
    ];
  }

  return null;
}
