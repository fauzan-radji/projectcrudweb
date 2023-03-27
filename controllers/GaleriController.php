<?php

namespace Controllers;

use Core\Storage;
use Models\Galeri;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class GaleriController extends Controller
{
  /**
   * Menampilkan view seluruh data
   */
  public static function index()
  {
    $galeris = Galeri::all();

    return view('galeri/index', ['galeris' => $galeris]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    static::authorize('superadmin');

    return view('galeri/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
  public static function store()
  {
    static::authorize('superadmin');

    $judul  = htmlspecialchars($_POST['judul']);
    $gambar = '';
    $sumber = htmlspecialchars($_POST['sumber']);
    $tempat  = htmlspecialchars($_POST['tempat']);

    $result = Storage::upload($_FILES['gambar']);
    if ($result['error']) {
      set_error($result['error']);
      return redirect('/galeri/create');
    } else {
      $gambar = $result['filename'];
    }

    $result = Galeri::insert([
      "''", "'$gambar'", "'$judul'", "'$sumber'", "'$tempat'"
    ]);

    if ($result) set_success("Berhasil menambah data galeri $judul");
    else set_error("Gagal menambah data galeri $judul");

    return redirect('/galeri');
  }

  /**
   * Menampilkan view data spesifik
   */
  public static function show($id)
  {
    $galeri = Galeri::find($id, 'id_galeri');

    return view('galeri/show', ['galeri' => $galeri]);
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit($id)
  {
    static::authorize('superadmin');

    $galeri = Galeri::find($id, 'id_galeri');

    return view('galeri/edit', ['galeri' => $galeri]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    static::authorize('superadmin');

    $judul  = htmlspecialchars($_POST['judul']);
    $sumber = htmlspecialchars($_POST['sumber']);
    $tempat  = htmlspecialchars($_POST['tempat']);
    $galeri = Galeri::find($id, 'id_galeri');
    $gambar  = $galeri['gambar'];
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
      $result = Storage::upload($_FILES['gambar']);
      if ($result['error']) {
        set_error($result['error']);
        return redirect("/galeri/$id/update");
      } else {
        Storage::delete($gambar);
        $gambar = $result['filename'];
      }
    }

    $result = Galeri::update($id, [
      "gambar" => "'$gambar'",
      "judul" => "'$judul'",
      "sumber" => "'$sumber'",
      "tempat" => "'$tempat'"
    ], 'id_galeri');

    if ($result) set_success("Berhasil mengupdate data galeri $judul");
    else set_error("Gagal mengupdate data galeri $judul");

    return redirect('/galeri');
  }

  public static function destroy($id)
  {
    static::authorize('superadmin');

    $galeri = Galeri::find($id, 'id_galeri');
    $result = Galeri::delete($id, 'id_galeri');
    Storage::delete($galeri['gambar']);

    if ($result) set_success("Berhasil menghapus data galeri {$galeri['judul']}");
    else set_error("Gagal menghapus data galeri {$galeri['judul']}");

    return redirect('/galeri');
  }
}
