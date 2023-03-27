<?php

namespace Controllers;

use Core\Storage;
use Models\Event;

use function Core\redirect;
use function Core\set_error;
use function Core\set_success;
use function Core\view;

class EventController extends Controller
{
  /**
   * Menampilkan view seluruh data
   */
  public static function index()
  {
    $events = Event::all();

    return view('event/index', ['events' => $events]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    static::authorize('superadmin');

    return view('event/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
  public static function store()
  {
    static::authorize('superadmin');

    $judul  = htmlspecialchars($_POST['judul']);
    $gambar = '';
    // $gambar  = htmlspecialchars($_POST['gambar']);
    $isievent = htmlspecialchars($_POST['isievent']);
    $status  = htmlspecialchars($_POST['status']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);

    $result = Storage::upload($_FILES['gambar']);
    if ($result['error']) {
      set_error($result['error']);
      return redirect('/event/create');
    } else {
      $gambar = $result['filename'];
    }

    $result = Event::insert([
      "''", "'$judul'", "'$gambar'", "'$isievent'", "'$status'", "'$tanggal'"
    ]);

    if ($result) set_success("Berhasil menambah data event $judul");
    else set_error("Gagal menambah data event $judul");

    return redirect('/event');
  }

  /**
   * Menampilkan view data spesifik
   */
  public static function show($id)
  {
    $event = Event::find($id, 'id_event');

    return view('event/show', ['event' => $event]);
  }

  /**
   * Menampilkan view form edit untuk data spesifik
   */
  public static function edit($id)
  {
    static::authorize('superadmin');

    $event = Event::find($id, 'id_event');

    return view('event/edit', ['event' => $event]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    static::authorize('superadmin');

    $judul  = htmlspecialchars($_POST['judul']);
    $isievent = htmlspecialchars($_POST['isievent']);
    $status  = htmlspecialchars($_POST['status']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);
    $event = Event::find($id, 'id_event');
    $gambar  = $event['gambar'];
    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
      $result = Storage::upload($_FILES['gambar']);
      if ($result['error']) {
        set_error($result['error']);
        return redirect("/event/$id/update");
      } else {
        Storage::delete($gambar);
        $gambar = $result['filename'];
      }
    }

    $result = Event::update($id, [
      "judul" => "'$judul'",
      "gambar" => "'$gambar'",
      "isievent" => "'$isievent'",
      "status" => "'$status'",
      "tanggal" => "'$tanggal'"
    ], 'id_event');

    if ($result) set_success("Berhasil mengupdate data event $judul");
    else set_error("Gagal mengupdate data event $judul");

    return redirect('/event');
  }

  public static function destroy($id)
  {
    static::authorize('superadmin');

    $event = Event::find($id, 'id_event');
    $result = Event::delete($id, 'id_event');
    Storage::delete($event['gambar']);

    if ($result) set_success("Berhasil menghapus data event {$event['judul']}");
    else set_error("Gagal menghapus data event {$event['judul']}");

    return redirect('/event');
  }
}
