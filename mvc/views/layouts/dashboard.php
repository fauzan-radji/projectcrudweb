<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php section('title') ?></title>

  <link rel="stylesheet" href="<?= asset('assets/css/main/app.css') ?>" />
  <link rel="stylesheet" href="<?= asset('assets/css/main/app-dark.css') ?>" />
  <link rel="shortcut icon" href="<?= asset('assets/images/logo/favicon.svg') ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?= asset('assets/images/logo/favicon.png') ?>" type="image/png" />

  <link rel="stylesheet" href="<?= asset('assets/css/shared/iconly.css') ?>" />
</head>

<body>
  <script src="<?= asset('assets/js/initTheme.js') ?>"></script>
  <div id="app">
    <?php component('sidebar') ?>

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <h3><?php section('title') ?></h3>
      </div>
      <div class="page-content">
        <section class="row">
          <?php section('main') ?>
        </section>
      </div>

      <?php component('footer') ?>
    </div>
  </div>
  <script src="<?= asset('assets/js/bootstrap.js') ?>"></script>
  <script src="<?= asset('assets/js/app.js') ?>"></script>

  <!-- Need: Apexcharts -->
  <script src="<?= asset('assets/extensions/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= asset('assets/js/pages/dashboard.js') ?>"></script>

  <?php section('script') ?>
</body>

</html>