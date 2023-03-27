<?php

use function Core\asset;
use function Core\component;
use function Core\formatTime;
use function Core\route;
use function Core\truncate;
use function Core\uploads;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="<?= asset('css/main/app.css') ?>" />

  <link rel="shortcut icon" href="<?= asset('favicon.jpg') ?>" type="image/x-icon" />

  <title>Japesda</title>
</head>

<body>
  <?php component('navbar') ?>

  <?php component('carousel', [
    'beritas' => $beritas
  ]) ?>

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

  <footer class="bg-success">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <h5 class="text-uppercase text-white">Japesda</h5>
          <ul style="list-style: none" class="ps-0">
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="https://goo.gl/maps/ReUEFLv3WMQt7Mby9">Jl. Jkt No.1, Huangobotu, Dungingi, Kota Gorontalo, Gorontalo
                96138</a>
            </li>
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="tel:08114356001">08114356001</a>
            </li>
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="mailto:gorontalojapesda@gmail.com">gorontalojapesda@gmail.com</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5 class="text-uppercase text-white">Jam Kerja</h5>
          <ul style="list-style: none" class="ps-0">
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Mon - Fri : 08:00 - 17:00
            </li>
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Sat : 09:00 - 15:00
            </li>
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Sun : Close
            </li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5 class="text-uppercase text-white">Follow Us On</h5>
          <ul style="list-style: none" class="ps-0">
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="https://www.facebook.com/japesdajo/">Facebook</a>
            </li>
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="https://www.instagram.com/japesda/">Instagram</a>
            </li>
            <li class="mb-2">
              <a style="color: #fff8; text-decoration: none" href="https://www.youtube.com/channel/UCVw2XaXImZTOz3q3X5KjQ6w">YouTube</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column align-items-center py-3 text-white" style="background-color: #0008">
      <span>Copyright &copy; 2023</span>
      <span>Made with ❤️ by
        <a href="https://instagram.com/ksl.ung" class="text-info" style="text-decoration: none">KSL UNG</a></span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>