<?php

namespace Core;

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

function env($key, $default = '')
{
  $content = file_get_contents(ROOT . '.env');
  $content = preg_split('/[\r\n]/', $content);
  foreach ($content as $line) {
    if (str_starts_with($line, '#') || strlen($line) === 0) continue;

    [$k, $v] = explode('=', $line);
    if ($k === $key) return $v;
  }

  return $default;
}

function asset($asset)
{
  return env('APP_URL') . 'public/' . trim($asset, '/');
}

function uploads($asset)
{
  return env('APP_URL') . 'uploads/' . trim($asset, '/');
}

function route($route)
{
  return env('APP_URL') . trim($route, '/');
}

function redirect($url)
{
  header('Location: ' . route($url));
}

function view($view, $data = [])
{
  foreach ($data as $key => $value) {
    $GLOBALS[$key] = $value;
    ${$key} = $value;
  }

  require ROOT . "views/$view.php";
}

function extend($layout, $data = [])
{
  foreach ($data as $key => $value) ${$key} = $value;

  require_once ROOT . "views/layouts/$layout.php";
}

function section($section, $data = [])
{
  if (function_exists($section)) $section($data);
}

function component($component, $data = [])
{
  foreach ($data as $key => $value)
    ${$key} = $value;

  require ROOT . "views/components/$component.php";
}

function get_error()
{
  if (array_key_exists('error', $_SESSION)) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
    return $error;
  } else return null;
}

function set_error($error)
{
  $_SESSION['error'] = $error;
}

function get_success()
{
  if (array_key_exists('success', $_SESSION)) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
    return $success;
  } else return null;
}

function set_success($success)
{
  $_SESSION['success'] = $success;
}

function routeIs($guess)
{
  global $path;
  $guess = str_replace('/', '\\/', $guess);
  $pattern = '/^' . str_replace('*', '.*', $guess) . '$/';

  return preg_match($pattern, $path);
}

function truncate($string, $length = 30, $append = "&hellip;")
{
  $string = trim($string);

  if (strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function formatTime($format, $time)
{
  return date($format, strtotime($time));
}
