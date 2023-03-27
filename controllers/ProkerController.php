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
    $prokers = Proker::all();

    return view('proker/index', ['prokers' => $prokers]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    static::authorize('superadmin');

    return view('proker/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
  public static function store()
  {
    static::authorize('superadmin');

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
    else set_error("Gagal menambah data proker $namakeg");

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
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit($id)
  {
    static::authorize('superadmin');

    $proker = Proker::find($id, 'id_proker');

    return view('proker/edit', ['proker' => $proker]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    static::authorize('superadmin');

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
    else set_error("Gagal mengupdate data proker $namakeg");

    return redirect('/proker');
  }

  public static function destroy($id)
  {
    static::authorize('superadmin');

    $proker = Proker::find($id, 'id_proker');
    $result = Proker::delete($id, 'id_proker');

    if ($result) set_success("Berhasil menghapus data proker {$proker['namakeg']}");
    else set_error("Gagal menghapus data proker {$proker['namakeg']}");

    return redirect('/proker');
  }
}
