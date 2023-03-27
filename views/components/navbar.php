<?php

use function Core\asset;
use function Core\route;

?><nav class="navbar bg-success navbar-dark navbar-expand-lg py-2">
  <div class="container">
    <a class="navbar-brand" href="#carousel"><img src="<?= asset('home/img/logo.jpg') ?>" alt="Bootstrap" style="height: 40px; aspect-ratio: 2/1; object-fit: cover" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <div class="navbar-nav">
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#proker"><i class="bi bi-list-check d-flex align-items-center"></i>Program Kerja</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#event"><i class="bi bi-calendar-event d-flex align-items-center"></i>Event</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#galeri"><i class="bi bi-image-fill d-flex align-items-center"></i>Galeri</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#berita"><i class="bi bi-newspaper d-flex align-items-center"></i>Berita</a>
        <a class="nav-link d-inline-flex align-items-center gap-2" href="#peta"><i class="bi bi-map-fill d-flex align-items-center"></i>Peta</a>
      </div>

      <a class="btn icon btn-outline-light my-2 ms-auto d-inline-flex align-items-center gap-2" href="<?= route('/login') ?>">Masuk<i class="bi bi-box-arrow-right d-flex align-items-center"></i></a>
    </div>
  </div>
</nav>