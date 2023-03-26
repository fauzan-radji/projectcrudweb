<?php

namespace Controllers;

use Core\Auth;
use Models\User;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class UserController extends Controller
{
  /**
   * Menampilkan view seluruh data
   */
  public static function index()
  {
    return;
  }

  /**
   * Menampilkan view data spesifik
   */
  public static function show()
  {
    static::authorize('superadmin', 'direktur');

    $user = Auth::auth();

    return view('user/show', ['user' => $user]);
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit()
  {
    static::authorize('superadmin', 'direktur');

    $user = Auth::auth();

    return view('user/edit', ['user' => $user]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    static::authorize('superadmin', 'direktur');

    $namakeg  = htmlspecialchars($_POST['namakeg']);
    $tujuankeg  = htmlspecialchars($_POST['tujuankeg']);
    $sasarankeg = htmlspecialchars($_POST['sasarankeg']);
    $danakeg  = htmlspecialchars($_POST['danakeg']);
    $waktukeg  = htmlspecialchars($_POST['waktukeg']);
    $tempatkeg  = htmlspecialchars($_POST['tempatkeg']);

    $result = User::update($id, [
      "namakeg" => "'$namakeg'",
      "tujuankeg" => "'$tujuankeg'",
      "sasarankeg" => "'$sasarankeg'",
      "danakeg" => "'$danakeg'",
      "waktukeg" => "'$waktukeg'",
      "tempatkeg" => "'$tempatkeg'"
    ]);

    if ($result) set_success("Berhasil mengupdate data user $namakeg");
    else set_error("Gagal mengupdate data user $namakeg");

    return redirect('/user');
  }
}
