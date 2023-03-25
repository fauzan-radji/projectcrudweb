<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

function env($key, $default = null)
{
  $content = file_get_contents(ROOT . '/projectcrudweb/procedural/.env');
  $content = preg_split('/\r\n/', $content);
  foreach ($content as $line) {
    [$k, $v] = explode('=', $line);
    if ($k === $key) return $v;
  }

  return isset($default) ? $default : '';
}

function app_url($url = '')
{
  return env('APP_URL') . trim($url, '/');
}

function base64encode($string)
{
  return base64_encode(
    base64_encode(
      base64_encode(
        base64_encode(
          base64_encode(
            base64_encode(
              base64_encode(
                base64_encode(
                  base64_encode($string)
                )
              )
            )
          )
        )
      )
    )
  );
}
