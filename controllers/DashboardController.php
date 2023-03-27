<?php

namespace Controllers;

use Models\Berita;
use Models\Event;
use Models\Proker;
use Models\User;

use function Core\view;

class DashboardController extends Controller
{

  public static function index()
  {
    $proker = Proker::count();
    $berita = Berita::count();
    $event = Event::count();
    $user = User::count();

    return view('dashboard', [
      'proker' => $proker,
      'berita' => $berita,
      'event' => $event,
      'user' => $user
    ]);
  }
}
