<?php

namespace Controllers;

use Models\Proker;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
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

  public static function store()
  {
    $namakeg  = htmlspecialchars($_POST['namakeg']);
    $tujuankeg  = htmlspecialchars($_POST['tujuankeg']);
    $sasarankeg = htmlspecialchars($_POST['sasarankeg']);
    $danakeg  = htmlspecialchars($_POST['danakeg']);
    $waktukeg  = htmlspecialchars($_POST['waktukeg']);
    $tempatkeg  = htmlspecialchars($_POST['tempatkeg']);

    $result = Proker::insert([
      "''", "'$namakeg'", "'$tujuankeg'", "'$sasarankeg'", "'$danakeg'", "'$waktukeg'", "'$tempatkeg'"
    ]);

    if ($result) set_success("Berhasil menambah data proker $namakeg");
    else set_error("Berhasil menambah data proker $namakeg");

    return redirect('/proker');
  }
}
