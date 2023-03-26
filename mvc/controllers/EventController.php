<?php

namespace Controllers;

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
    $events = Event::getAll();

    return view('event/index', ['events' => $events]);
  }

  /**
   * Menampilkan view form create
   */
  public static function create()
  {
    return view('event/create');
  }

  /**
   * Menyimpan data dari form ke database
   */
  public static function store()
  {
    $judul  = htmlspecialchars($_POST['judul']);
    // $gambar  = htmlspecialchars($_POST['gambar']);
    $gambar = '';
    $isievent = htmlspecialchars($_POST['isievent']);
    $status  = htmlspecialchars($_POST['status']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);

    $result = Event::insert([
      "''", "'$judul'", "'$gambar'", "'$isievent'", "'$status'", "'$tanggal'"
    ]);

    if ($result) set_success("Berhasil menambah data event $judul");
    else set_error("Berhasil menambah data event $judul");

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
    $event = Event::find($id, 'id_event');

    return view('event/edit', ['event' => $event]);
  }

  /**
   * Mengupdate data spesifik ke database
   */
  public static function update($id)
  {
    $judul  = htmlspecialchars($_POST['judul']);
    // $gambar  = htmlspecialchars($_POST['gambar']);
    $gambar  = '';
    $isievent = htmlspecialchars($_POST['isievent']);
    $status  = htmlspecialchars($_POST['status']);
    $tanggal  = htmlspecialchars($_POST['tanggal']);

    $result = Event::update($id, [
      "judul" => "'$judul'",
      "gambar" => "'$gambar'",
      "isievent" => "'$isievent'",
      "status" => "'$status'",
      "tanggal" => "'$tanggal'"
    ], 'id_event');

    if ($result) set_success("Berhasil mengupdate data event $judul");
    else set_error("Berhasil mengupdate data event $judul");

    return redirect('/event');
  }

  public static function destroy($id)
  {
    $event = Event::find($id, 'id_event');
    $result = Event::delete($id, 'id_event');

    if ($result) set_success("Berhasil menghapus data event {$event['judul']}");
    else set_error("Berhasil menghapus data event {$event['judul']}");

    return redirect('/event');
  }
}
