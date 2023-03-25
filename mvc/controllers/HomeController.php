<?php

namespace Controllers;

use function Core\view;

class HomeController extends Controller
{
  public static function index()
  {
    return view('home');
  }
}
