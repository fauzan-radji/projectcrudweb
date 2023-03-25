<?php

require_once '_404.php';
require_once 'home.php';
require_once 'dashboard.php';
require_once 'auth_login.php';

function controller($controller, $data = [])
{
  if (function_exists($controller)) {
    $controller($data);
  } else {
    throw new Error("Controller $controller tidak ada.");
  }
}
