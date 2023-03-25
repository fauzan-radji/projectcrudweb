<?php

function env($key)
{
  $content = file_get_contents('../.env');
  $content = preg_split('/\n/', $content);
  foreach ($content as $line) {
    [$k, $v] = explode('=', $line);
    if ($k === $key) return $v;
  }

  return '';
}

function asset($asset)
{
  return env('APP_URL') . 'public/' . $asset;
}

function base_url($route)
{
  return env('APP_URL') . 'public' . $route;
}

function view($view, $data = [])
{
  foreach ($data as $key => $value)
    ${$key} = $value;

  require "./views/$view.php";
}
