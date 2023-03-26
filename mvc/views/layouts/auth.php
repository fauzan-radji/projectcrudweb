<?php

use Core\Session;

use function Core\asset;
use function Core\get_error;
use function Core\get_success;
use function Core\section;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php section('title'); ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?= asset('auth/images/icons/favicon.ico') ?>" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/bootstrap/css/bootstrap.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/animate/animate.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/css-hamburgers/hamburgers.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/animsition/css/animsition.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/select2/select2.min.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/vendor/daterangepicker/daterangepicker.css') ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/css/util.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset('auth/css/main.css') ?>">
  <!--===============================================================================================-->
</head>

<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?= asset('auth/images/bg-01.jpg') ?>');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          <?php section('title') ?>
        </span>

        <?php section('form') ?>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/animsition/js/animsition.min.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/bootstrap/js/popper.js') ?>"></script>
  <script src="<?= asset('auth/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/select2/select2.min.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/daterangepicker/moment.min.js') ?>"></script>
  <script src="<?= asset('auth/vendor/daterangepicker/daterangepicker.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/vendor/countdowntime/countdowntime.js') ?>"></script>
  <!--===============================================================================================-->
  <script src="<?= asset('auth/js/main.js') ?>"></script>

  <!-- Custom Script -->
  <script>
    <?php if (Session::has('error')) : ?>
      alert('<?= get_error() ?>')
    <?php endif; ?>

    <?php if (Session::has('success')) : ?>
      alert('<?= get_success() ?>')
    <?php endif; ?>
  </script>
</body>

</html>