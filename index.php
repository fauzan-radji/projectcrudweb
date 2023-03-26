<?php

session_start();



require_once "config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
  $userSession = $_SESSION["ssUser"];
  $resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

$title = "Dashboard";
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";




$queryProker = mysqli_query($koneksi, "SELECT * FROM tbl_proker");
$jmlProker   = mysqli_num_rows($queryProker);


$queryBerita = mysqli_query($koneksi, "SELECT * FROM tbl_berita");
$jmlBerita   = mysqli_num_rows($queryBerita);


$queryEvent = mysqli_query($koneksi, "SELECT * FROM tbl_event");
$jmlEvent   = mysqli_num_rows($queryEvent);


$queryUser    = mysqli_query($koneksi, "SELECT * FROM tbl_user");
$jmlUser      = mysqli_num_rows($queryUser);



?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Home</li>
      </ol>

      <div class="row">
        <div class="col-xl-3 col-md-4">
          <div class="card bg-success text-white mb-4">

            <div class="card-body"><i class="fa-solid fa-diagram-project"></i>
              <h5><?= $jmlProker  .  'Program' ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">

              <a class="small text-white stretched-link" href="#"> </a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body"><i class="fa-solid fa-square-rss"></i>
              <h5><?= $jmlBerita  .  'Berita' ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#"></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body"><i class="fa-solid fa-feather"></i>
              <h5><?= $jmlEvent  .  'Event' ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#"></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body"><i class="fa-solid fa-users-between-lines"></i>
              <h5><?= $jmlUser  .  'User' ?></h5>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white" href="#"></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div>
          <iframe src="" width="100%" height="242%"></iframe>
        </div>
      </div>
    </div>
  </main>

  <?php
  require_once "template/footer.php";
  ?>