<?php

function env($key, $default = null)
{
  $content = file_get_contents('.env');
  $content = preg_split('/\n/', $content);
  foreach ($content as $line) {
    [$k, $v] = explode('=', $line);
    if ($k === $key) return $v;
  }

  return isset($default) ? $default : '';
}