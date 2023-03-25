<?php

namespace Controllers;

use function Core\view;

class _404Controller extends Controller
{
  public static function index()
  {
    return view('404');
  }
}
