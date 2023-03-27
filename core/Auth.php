<?php

namespace Core;

class Auth
{
  public static function login($username, $password)
  {
    $result = Database::query("SELECT * FROM tbl_user WHERE username = '$username'");
    $data = Database::fetch($result)[0];

    if (Database::num_rows($result) < 1) {
      return [
        'msg' => 'Username salah',
        'success' => false
      ];
    }

    if (!password_verify($password, $data['password'])) {
      return [
        'msg' => 'Password salah',
        'success' => false
      ];
    }

    return [
      'msg' => 'Login sukses',
      'success' => true
    ];
  }

  public static function logout()
  {
    Session::unset();
  }

  public static function user()
  {
    if (!Session::has('username')) return null;

    $username = Session::get('username');
    $result = Database::query("SELECT * FROM tbl_user WHERE username = '$username'");
    $user = Database::fetch($result)[0];

    return $user;
  }

  public static function is($level)
  {
    return static::user() && static::user()['level'] === $level;
  }
}
