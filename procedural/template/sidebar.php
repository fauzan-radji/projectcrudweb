<?php
// =======================================
// CHECK ACTIVE MENU SIDEBAR
// =======================================

// KONFIGURASI URL ACTIVE (LOCAL & ONLINE)
$urlActiveLocal = "/projectcrudweb";
$urlActiveOnline = "";

// KONFIGURASI URL ACTIVE (LOCAL)
$urlActive = $urlActiveLocal;


// KONFIGURASI URL ACTIVE (LOCAL)
$requestLink = "$_SERVER[REQUEST_URI]";

// MENU ACTIVE DASHBOARD
if ($requestLink === "$urlActive/") {
  $dashboardActive = "active-sidebar";
}

// MENU ACTIVE ADD PROFILE
if ($requestLink === "$urlActive/profil/add-profil") {
  $addProfileActive = "active-sidebar";
}

// MENU ACTIVE PROKER
if ($requestLink === "$urlActive/proker/proker") {
  $prokerActive = "active-sidebar";
}
// MENU ACTIVE PROKER
if ($requestLink === "$urlActive/proker/add-proker") {
  $prokerActive = "active-sidebar";
}

// MENU ACTIVE EVENT
if ($requestLink === "$urlActive/event/event") {
  $eventActive = "active-sidebar";
}
// MENU ACTIVE EVENT
if ($requestLink === "$urlActive/event/add-event") {
  $eventActive = "active-sidebar";
}

// MENU ACTIVE GALERI
if ($requestLink === "$urlActive/galeri/galeri") {
  $galeriActive = "active-sidebar";
}
// MENU ACTIVE GALERI
if ($requestLink === "$urlActive/galeri/add-galeri") {
  $galeriActive = "active-sidebar";
}

// MENU ACTIVE BERITA
if ($requestLink === "$urlActive/berita/berita") {
  $beritaActive = "active-sidebar";
}
// MENU ACTIVE BERITA
if ($requestLink === "$urlActive/berita/add-berita") {
  $beritaActive = "active-sidebar";
}

// MENU ACTIVE USER
if ($requestLink === "$urlActive/user/add-user") {
  $userActive = "active-sidebar";
}

// MENU ACTIVE MAPS
if ($requestLink === "$urlActive/petaweb/maps") {
  $mapsActive = "active-sidebar";
}


?>

<head>
  <style>
    .nav-link {
      margin-left: 10px;
      margin-right: 10px;
    }

    .active-sidebar {
      background-color: #eaeaea;
      color: #333 !important;
      border-radius: 50px;
    }

    .active-sidebar .sb-nav-link-icon {
      color: #333 !important;
    }
  </style>
</head>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu mt-4">
        <div class="nav">
          <a class="nav-link <?= $dashboardActive; ?>" href="<?= app_url('dashboard') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>

          <?php if (isset($_SESSION["login"])) : ?>
            <?php if ($rowSession["level"] === "superadmin") : ?>
              <a class="nav-link <?= $addProfileActive; ?>" href="<?= app_url('profil/add-profil') ?>">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-display"></i></div>
                Profil
              </a>
            <?php endif; ?>
          <?php endif; ?>

          <a class="nav-link <?= $prokerActive; ?>" href="<?= app_url('proker/proker') ?>">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-bar"></i></div>
            Program Kerja
          </a>

          <a class="nav-link <?= $eventActive; ?>" href="<?= app_url('event/event') ?>">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-bar"></i></div>
            Event
          </a>

          <a class="nav-link <?= $galeriActive; ?>" href="<?= app_url('galeri/galeri') ?>">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-images"></i></div>
            Galeri
          </a>

          <a class="nav-link <?= $beritaActive; ?>" href="<?= app_url('berita/berita') ?>">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
            Berita
          </a>

          <?php if (isset($_SESSION["login"])) : ?>
            <?php if ($rowSession["level"] === "superadmin") : ?>
              <a class="nav-link <?= $userActive; ?>" href="<?= app_url('user/add-user') ?>">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Data User
              </a>
            <?php endif; ?>
          <?php endif; ?>

          <a class="nav-link <?= $mapsActive; ?>" href="<?= app_url('petaweb/maps') ?>">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-map"></i></div>
            Peta
          </a>

          <a class="nav-link <?= $mapsActive; ?>" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
            Keluar
          </a>



        </div>
      </div>
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">Copyright &copy; Farhan <?= date('Y') ?></div>
        </div>
      </div>

    </nav>
  </div>