<?php

namespace Controllers;

use Models\Proker;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class ProkerController extends Controller
{
  /**
   * Menampilkan view seluruh data
   */
  public static function index()
  {
    $prokers = Proker::getAll();

    return view('proker/index', ['prokers' => $prokers]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    return view('proker/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
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

  /**
   * Menampilkan view data spesifik
   */
  public static function show($id)
  {
    $proker = Proker::find($id, 'id_proker');

    return view('proker/show', ['proker' => $proker]);
  }

  /**
   * Menampilkan view form edit
   */
  public static function edit($id)
  {
    $proker = Proker::find($id, 'id_proker');

    return view('proker/edit', ['proker' => $proker]);
  }

  /**
   * Mengupdate data tertentu ke database
   */
  public static function update($id)
  {
    $proker = Proker::find($id, 'id_proker');
    $namakeg  = htmlspecialchars($_POST['namakeg']);
    $tujuankeg  = htmlspecialchars($_POST['tujuankeg']);
    $sasarankeg = htmlspecialchars($_POST['sasarankeg']);
    $danakeg  = htmlspecialchars($_POST['danakeg']);
    $waktukeg  = htmlspecialchars($_POST['waktukeg']);
    $tempatkeg  = htmlspecialchars($_POST['tempatkeg']);

    $result = Proker::update($id, [
      "namakeg" => "'$namakeg'",
      "tujuankeg" => "'$tujuankeg'",
      "sasarankeg" => "'$sasarankeg'",
      "danakeg" => "'$danakeg'",
      "waktukeg" => "'$waktukeg'",
      "tempatkeg" => "'$tempatkeg'"
    ], 'id_proker');

    if ($result) set_success("Berhasil mengupdate data proker $namakeg");
    else set_error("Berhasil mengupdate data proker $namakeg");

    return redirect('/proker');
  }
}
