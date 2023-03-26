<?php

namespace Core;

class Auth
{
  public static function login($username, $password)
  {
  }

  public static function auth()
  {
    return (key_exists('user', $_SESSION))
      ? $_SESSION['user']
      : null;
  }
}
