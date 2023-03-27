<?php

use function Core\component;
use function Core\extend;
use function Core\formatTime;
use function Core\route;
use function Core\truncate;
use function Core\uploads;

function main()
{
  global $prokers, $events, $galeris, $beritas;

  component('carousel', [
    'beritas' => $beritas
  ]);

?>

  <!-- Program Kerja -->
  <section id="proker" class="py-5" style="background-color: #ccc">
    <div class="container">
      <div class="d-flex gap-5 w-75 mx-auto mb-5 align-items-center">
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
        <h2 class="text-center text-success">Program Kerja</h2>
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
      </div>

      <div class="row">
        <?php foreach ($prokers as $proker) : ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-0"><?= $proker['namakeg'] ?></h5>
                <p class="text-muted fs-6"><?= $proker['tempatkeg'] ?>, <?= formatTime('j F Y', $proker['waktukeg']) ?></p>
                <p class="card-text">
                  Tujuan: <?= $proker['tujuankeg'] ?><br />
                  Sasaran: <?= $proker['sasarankeg'] ?><br />
                  Sumber Dana: <?= $proker['danakeg'] ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <!-- End Program Kerja -->

  <!-- Event -->
  <section id="event" class="py-5">
    <div class="container">
      <div class="d-flex gap-5 w-75 mx-auto mb-5 align-items-center">
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
        <h2 class="text-center text-success">Event</h2>
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
      </div>

      <div class="row">
        <?php foreach ($events as $event) : ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
              <img src="<?= uploads($event['gambar']) ?>" class="card-img-top" alt="<?= $event['judul'] ?>" />
              <div class="card-body">
                <h5 class="card-title mb-0"><?= $event['judul'] ?></h5>
                <p class="text-muted fs-6"><?= formatTime('j F Y', $event['tanggal']) ?></p>
                <p class="badge text-bg-info"><?= $event['status'] ?></p>
                <p class="card-text"><?= $event['isievent'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <!-- End Event -->

  <!-- Galeri -->
  <section id="galeri" class="py-5 bg-success">
    <div class="container">
      <div class="d-flex gap-5 w-75 mx-auto mb-5 align-items-center">
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-light" />
        <h2 class="text-center text-light">Galeri</h2>
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-light" />
      </div>

      <div class="row">
        <?php foreach ($galeris as $galeri) : ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
              <img src="<?= uploads($galeri['gambar']) ?>" class="card-img-top" alt="<?= $galeri['judul'] ?>" />
              <div class="card-body">
                <h5 class="card-title mb-0"><?= $galeri['judul'] ?></h5>
                <p class="text-muted fs-6">Sumber: <?= $galeri['sumber'] ?></p>
                <p class="card-text"><?= $galeri['tempat'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <!-- End Galeri -->

  <!-- Berita -->
  <section id="berita" class="py-5">
    <div class="container">
      <div class="d-flex gap-5 w-75 mx-auto mb-5 align-items-center">
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
        <h2 class="text-center text-success">Berita</h2>
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
      </div>

      <div class="row">
        <?php foreach ($beritas as $berita) : ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
              <img src="<?= uploads($berita['gambar']) ?>" class="card-img-top" alt="<?= $berita['judul'] ?>" />
              <div class="card-body">
                <h5 class="card-title mb-0"><?= $berita['judul'] ?></h5>
                <p class="text-muted fs-6"><?= $berita['tanggal'] ?></p>
                <p class="card-text"><?= truncate($berita['isiberita'], 150) ?></p>
                <a href="<?= route("/berita/{$berita['id_berita']}/read") ?>" class="btn icon btn-primary d-inline-flex align-items-center gap-2">Selengkapnya<i class="bi bi-arrow-right d-flex align-items-center"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
  <!-- End Berita -->

  <!-- Peta -->
  <section id="peta" class="py-5" style="background-color: #ccc">
    <div class="container">
      <div class="d-flex gap-5 w-75 mx-auto mb-5 align-items-center">
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
        <h2 class="text-center text-success">Peta</h2>
        <hr style="flex-grow: 1; height: 2px; border: none; opacity: 1" class="bg-success" />
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <iframe src="http://localhost/projectcrudweb-maps" frameborder="0" style="width: 100%; aspect-ratio: 16/9;"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Peta -->
<?php
}

extend('homepage', [
  'events' => $events,
  'prokers' => $prokers,
  'galeris' => $galeris,
  'beritas' => $beritas
]);
