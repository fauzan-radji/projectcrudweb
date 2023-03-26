<?php

namespace Controllers;

use Core\Auth;
use Core\Session;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class AuthController extends Controller
{
  public static function index()
  {
    return view('auth/index');
  }

  public static function login()
  {
    return view('auth/login');
  }

  public static function authenticate()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = Auth::login($username, $password);
    if (!$result['success']) {
      set_error($result['msg']);
      return redirect('/login');
    }

    Session::set('username', $username);
    set_success($result['msg']);
    return redirect('/');
  }
}
