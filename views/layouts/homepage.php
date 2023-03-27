<?php

use function Core\asset;
use function Core\component;
use function Core\formatTime;
use function Core\route;
use function Core\section;
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

  <!-- CSS to make the footer stays at the bottom of the page even when the content of the body is empty -->
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    body>*:not(:where(footer, .navbar)) {
      flex: 1;
    }
  </style>

  <title>Japesda</title>
</head>

<body>
  <?php component('navbar') ?>

  <?php section('main') ?>

  <span></span> <!-- FIXME: this is required so the footer stays at the bottom of the page even when the content of the body is empty -->
  <footer class="bg-success">
    <div class=" container py-5">
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