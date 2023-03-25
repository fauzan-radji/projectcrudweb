<?php

namespace Models;

use Core\Database;

abstract class Model
{
  protected static $table;

  public static function getAll()
  {
    return Database::query("SELECT * FROM " . static::$table);
  }

  public static function find($id)
  {
    Database::query("SELECT * FROM " . static::$table . " WHERE id = $id");
  }
}
