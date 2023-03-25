<?php

use function Core\asset;
use function Core\component;
use function Core\section;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php section('title') ?></title>

  <link rel="stylesheet" href="<?= asset('css/main/app.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/main/app-dark.css') ?>" />
  <link rel="shortcut icon" href="<?= asset('images/logo/favicon.svg') ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?= asset('images/logo/favicon.png') ?>" type="image/png" />

  <?php section('style') ?>
</head>

<body>
  <script src="<?= asset('js/initTheme.js') ?>"></script>
  <div id="app">
    <?php component('sidebar') ?>

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title mb-3">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3><?php section('title') ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <?php component('breadcrumb') ?>
            </div>
          </div>
        </div>

        <?php section('main') ?>
      </div>

      <?php component('footer') ?>
    </div>
  </div>
  <script src="<?= asset('js/bootstrap.js') ?>"></script>
  <script src="<?= asset('js/app.js') ?>"></script>

  <?php section('script') ?>
</body>

</html>