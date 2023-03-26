<?php

namespace Controllers;

use Core\Storage;
use Models\Berita;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class BeritaController extends Controller
{
  /**
   * Menampilkan view seluruh data
   */
  public static function index()
  {
    $beritas = Berita::getAll();

    return view('berita/index', ['beritas' => $beritas]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    return view('berita/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
  public static function store()
  {
    $judul  = htmlspecialchars($_POST['judul']);
    $gambar = '';
    $isiberita = htmlspecialchars($_POST['isiberita']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);

    $result = Storage::upload($_FILES['gambar']);
    if ($result['error']) {
      set_error($result['error']);
      return redirect('/berita/create');
    } else {
      $gambar = $result['filename'];
    }

    $result = Berita::insert([
      "''", "'$judul'", "'$gambar'", "'$isiberita'", "'$tanggal'"
    ]);

    if ($result) set_success("Berhasil menambah data berita $judul");
    else set_error("Gagal menambah data berita $judul");

    return redirect('/berita');
  }

  /**
   * Menampilkan view data spesifik
   */
  public static function show($id)
  {
    $berita = Berita::find($id, 'id_berita');

    return view('berita/show', ['berita' => $berita]);
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit($id)
  {
    $berita = Berita::find($id, 'id_berita');

    return view('berita/edit', ['berita' => $berita]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    $judul  = htmlspecialchars($_POST['judul']);
    $isiberita = htmlspecialchars($_POST['isiberita']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);
    $berita = Berita::find($id, 'id_berita');
    $gambar  = $berita['gambar'];
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
      $result = Storage::upload($_FILES['gambar']);
      if ($result['error']) {
        set_error($result['error']);
        return redirect("/berita/$id/update");
      } else {
        Storage::delete($gambar);
        $gambar = $result['filename'];
      }
    }

    $result = Berita::update($id, [
      "gambar" => "'$gambar'",
      "judul" => "'$judul'",
      "isiberita" => "'$isiberita'",
      "tanggal" => "'$tanggal'"
    ], 'id_berita');

    if ($result) set_success("Berhasil mengupdate data berita $judul");
    else set_error("Gagal mengupdate data berita $judul");

    return redirect('/berita');
  }

  public static function destroy($id)
  {
    $berita = Berita::find($id, 'id_berita');
    $result = Berita::delete($id, 'id_berita');
    Storage::delete($berita['gambar']);

    if ($result) set_success("Berhasil menghapus data berita {$berita['judul']}");
    else set_error("Gagal menghapus data berita {$berita['judul']}");

    return redirect('/berita');
  }
}
