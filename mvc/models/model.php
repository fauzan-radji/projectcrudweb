<?php

namespace Models;

use Core\Database;

abstract class Model
{
  protected static $table;

  public static function getAll()
  {
    $result = Database::query("SELECT * FROM " . static::$table);
    return Database::fetch($result);
  }

  public static function find($id)
  {
    $result = Database::query("SELECT * FROM " . static::$table . " WHERE id = $id");
    return Database::fetch($result);
  }

  public static function insert($values)
  {
    return Database::query("INSERT INTO " . static::$table . " VALUES (" . implode(',', $values) . ")");
  }
}
