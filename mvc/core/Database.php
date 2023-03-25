<?php

namespace Core;

class Database
{
  private static $host = '';
  private static $user = '';
  private static $pass = '';
  private static $name = '';
  private static $connection;

  public static function init()
  {
    self::$host = env('DB_HOST');
    self::$user = env('DB_USER');
    self::$pass = env('DB_PASS');
    self::$name = env('DB_NAME');

    self::$connection = mysqli_connect(self::$host, self::$user, self::$pass, self::$name);
  }

  public static function query($query)
  {
    $result = mysqli_query(self::$connection, $query);
    $data = [];
    while ($datum = mysqli_fetch_assoc($result)) {
      $data[] = $datum;
    }

    return $data;
  }
}
