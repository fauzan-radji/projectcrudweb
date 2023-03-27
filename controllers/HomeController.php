<?php

namespace Controllers;

use Models\Berita;
use Models\Event;
use Models\Galeri;
use Models\Proker;
use Models\User;

use function Core\view;

class HomeController extends Controller
{
  public static function index()
  {
    $prokers = Proker::all();
    $beritas = Berita::all();
    $events = Event::all();
    $galeris = Galeri::all();

    return view('home', [
      'prokers' => $prokers,
      'beritas' => $beritas,
      'events' => $events,
      'galeris' => $galeris,
    ]);
  }
}
