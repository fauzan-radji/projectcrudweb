<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/projectcrudweb/mvc/');

function env($key)
{
  $content = file_get_contents(ROOT . '.env');
  $content = preg_split('/\n/', $content);
  foreach ($content as $line) {
    [$k, $v] = explode('=', $line);
    if ($k === $key) return $v;
  }

  return '';
}

function asset($asset)
{
  return env('APP_URL') . 'public/' . trim($asset, '/');
}

function route($route)
{
  return env('APP_URL') . trim($route, '/');
}

function view($view, $data = [])
{
  foreach ($data as $key => $value)
    ${$key} = $value;

  require ROOT . "views/$view.php";
}

function extend($layout)
{
  require ROOT . "views/layouts/$layout.php";
}

function section($section, $data = [])
{
  if (function_exists($section)) $section($data);
}

function component($component)
{
  require ROOT . "views/components/$component.php";
}
