<?php

namespace Core;

class Session
{
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    return $_SESSION[$key];
  }

  public static function has($key)
  {
    return key_exists($key, $_SESSION);
  }

  public static function unset()
  {
    session_unset();
    $_SESSION = [];
  }
}
