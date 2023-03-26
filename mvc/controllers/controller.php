<?php

namespace Controllers;

use Core\Auth;

use function Core\redirect;
use function Core\view;

abstract class Controller
{
  abstract public static function index();

  public static function authorize($level)
  {
    if (!Auth::is($level)) return redirect('/error/403');
  }
}
