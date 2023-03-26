<?php

namespace Controllers;

use function Core\view;

class _403Controller extends Controller
{
  public static function index()
  {
    return view('403');
  }
}
