<?php

namespace Controllers;

use function Core\redirect;
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

  public static function authenticate()
  {
    return redirect('/login');
  }
}
