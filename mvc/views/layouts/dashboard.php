<?php

use function Core\asset;
use function Core\component;
use function Core\get_error;
use function Core\get_success;
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

  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= asset('extensions/sweetalert2/sweetalert2.min.css') ?>" />

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

  <!-- Sweetalert -->
  <script src="<?= asset('extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script>
    <?php
    $error = get_error();
    if ($error) :
    ?>
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "<?= $error ?>"
      })
    <?php
    endif;

    $success = get_success();
    if ($success) :
    ?>
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "<?= $success ?>"
      })
    <?php
    endif;
    ?>
  </script>
  <script>
    function sweetconfirm(e, {
      title,
      text
    }) {
      Swal.fire({
        title,
        text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = e.target.href;
        }
      })
    }
  </script>
  <?php section('script') ?>
</body>

</html>