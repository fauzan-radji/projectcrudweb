<?php

require_once '_404.php';
require_once 'home.php';
require_once 'about.php';
require_once 'welcome.php';
require_once 'users.php';
require_once 'user_show.php';

function controller($controller, $data = [])
{
  if (function_exists($controller)) {
    $controller($data);
  } else {
    throw new Error("Controller $controller tidak ada.");
  }
}
