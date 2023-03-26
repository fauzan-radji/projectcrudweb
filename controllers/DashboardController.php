<?php

namespace Controllers;

use function Core\view;

class DashboardController extends Controller
{
  public static function index()
  {
    return view('dashboard');
  }
}
