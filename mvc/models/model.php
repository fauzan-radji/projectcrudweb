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

  public static function find($id, $column = 'id')
  {
    $result = Database::query("SELECT * FROM " . static::$table . " WHERE $column = $id");
    return Database::fetch($result)[0];
  }

  public static function insert($values)
  {
    return Database::query("INSERT INTO " . static::$table . " VALUES (" . implode(',', $values) . ")");
  }
}
