<?php
require_once '../helper.php';
?>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand bg-light shadow p-3 mb-5 bg-body rounded ">
    <!-- Navbar Brand-->
    <img src="<?= app_url('assets/images/Japesda-Gorontalo.jpg') ?>" alt="Logo" class="me-4 ms-3" width="8%">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <span class="text-white text-capitalize"><?= "Admin" ?></span>
    </form>
    <!-- Navbar-->

    <!-- Profile -->
    <?php if (!isset($_SESSION["login"])) : ?>
      <?php if (!isset($rowSession["level"])) : ?>
        <div class="btn-group profil-user">
          <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= app_url('assets/images/default.png') ?>" alt="" style="width: 40px; height:40px;border-radius:50%; object-fit: cover;">
            Akun Saya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= app_url('auth/login') ?>">Masuk <i class="fa-solid fa-right-from-bracket"></i></a></li>
          </ul>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (!isset($_SESSION["login"])) : ?>
      <?php if (isset($rowSession["level"])) : ?>
        <!-- Profile -->
        <div class="btn-group profil-user">
          <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= app_url("assets/images/{$rowSession["gambar"]}") ?>" alt="" style="width: 40px; height:40px;border-radius:50%; object-fit: cover;">
            <?= $rowSession["nama"]; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= app_url(
                                                  'account/profile?cmd=' . base64encode($rowSession["id"])
                                                ); ?>x">Akun Saya</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar <i class="fa-solid fa-right-from-bracket"></i></a></li>
          </ul>
        </div>
      <?php endif; ?>
    <?php endif; ?>


  </nav>

  <div class="regular-shadow">Regular shadow</div>

  <!-- Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="logoutModalLabel">Keluar?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Anda ingin meninggalkan sesi anda saat ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="<?= app_url('auth/logout') ?>" class="btn btn-danger">Keluar</a>
        </div>
      </div>
    </div>
  </div>