<?php

namespace Controllers;

use Models\Proker;

use function Core\view;

class ProkerController extends Controller
{
  public static function index()
  {
    $prokers = Proker::getAll();

    return view('proker/index', ['prokers' => $prokers]);
  }

  public static function create()
  {
    return view('proker/create');
  }
}
