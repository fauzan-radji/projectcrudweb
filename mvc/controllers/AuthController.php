<?php

namespace Controllers;

use function Core\view;

class AuthController extends Controller
{
  public static function index()
  {
    return;
  }

  public static function login()
  {
    return view('auth/login');
  }
}
