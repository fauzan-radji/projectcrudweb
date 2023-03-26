<?php

namespace Controllers;

use function Core\view;

class PetawebController extends Controller
{
  public static function index()
  {
    return view('petaweb');
  }
}
