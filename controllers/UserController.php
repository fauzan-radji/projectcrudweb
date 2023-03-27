<?php

namespace Controllers;

use Core\Auth;
use Core\Storage;
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

    $user = Auth::user();

    return view('user/show', ['user' => $user]);
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit()
  {
    static::authorize('superadmin', 'direktur');

    $user = Auth::user();

    return view('user/edit', ['user' => $user]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update()
  {
    static::authorize('superadmin', 'direktur');
    $user = Auth::user();

    $nama  = htmlspecialchars($_POST['nama']);
    $username  = htmlspecialchars($_POST['username']);
    $gambar = $user['gambar'];
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
      $result = Storage::upload($_FILES['gambar']);
      if ($result['error']) {
        set_error($result['error']);
        return redirect("/user/update");
      } else {
        Storage::delete($gambar);
        $gambar = $result['filename'];
      }
    }

    $result = User::update($user['id'], [
      "nama" => "'$nama'",
      "username" => "'$username'",
      "gambar" => "'$gambar'",
    ]);

    if ($result) set_success("Berhasil mengupdate data user $nama");
    else set_error("Gagal mengupdate data user $nama");

    return redirect('/user');
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function editpass()
  {
    static::authorize('superadmin', 'direktur');

    $user = Auth::user();

    return view('user/editpass', ['user' => $user]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function updatepass()
  {
    static::authorize('superadmin', 'direktur');
    $user = Auth::user();

    $oldPassword  = htmlspecialchars($_POST['oldPassword']);
    $newPassword  = htmlspecialchars($_POST['newPassword']);
    $confirmPassword  = htmlspecialchars($_POST['confirmPassword']);

    // is the old password correct?
    if (!password_verify($oldPassword, $user['password'])) {
      set_error('Kata sandi saat ini tidak sesuai');
      return redirect('/user/editpass');
    }

    // is the password confirm correct?
    if ($newPassword !== $confirmPassword) {
      set_error('Konfirmasi password tidak sesuai');
      return redirect('/user/editpass');
    }

    // encrypt pass
    $password = password_hash($newPassword, PASSWORD_DEFAULT);

    $result = User::update($user['id'], [
      "password" => "'$password'",
    ]);

    if ($result) set_success("Berhasil mengupdate password user {$user['nama']}");
    else set_error("Gagal mengupdate password user {$user['nama']}");

    return redirect('/user');
  }
}
