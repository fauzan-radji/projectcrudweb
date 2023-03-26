<?php

session_start();
if (!isset($_SESSION['ssLogin'])) {
  header('location:../auth/login.php');
  exit;
}

require_once "../config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
  $userSession = $_SESSION["ssUser"];
  $resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

if ($rowSession["level"] === "direktur") {
  header("Location: " . app_url());
  exit;
}

$title = "Tambah Galeri";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id_galeri    = $_GET['id_galeri'];

$galeri = mysqli_query($koneksi, "SELECT * FROM tbl_galeri WHERE id_galeri = '$id_galeri'");
$data = mysqli_fetch_array($galeri);


?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Update Galeri</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../">Home</a></li>
        <li class="breadcrumb-item"><a href="./galeri">Galeri</a></li>
        <li class="breadcrumb-item active">Update Galeri</li>
      </ol>

      <form action="proses-galeri" method="POST" enctype="multipart/form-data">


        <div class="card col-8">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Tambah Data</span>
            <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>

          </div>

          <div class="card-body">
            <input type="hidden" name="gambarLama" value="<?= $data['gambar'] ?>">
            <div class="row">
              <div class="col-4 text-center px-5">
                <img src="../assets/images/<?= $data['gambar'] ?>" alt="gambarGaleri" width="80%">
                <input type="file" name="image" class="form-control form-control-sm mb-4">

              </div>

              <form class="row g-3 mt-6">


                <div class="col-12">
                  <label for="judul" class="form-label">Judul Gambar</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul'] ?>" placeholder="Masukan judul gambar" required>
                </div>

                <div class="col-12 mt-3">
                  <label for="sumber" class="form-label">Sumber Gamber</label>
                  <input type="text" class="form-control" id="sumber" name="sumber" value="<?= $data['sumber'] ?>" placeholder="Masukan sumber gambar" required>
                </div>

                <div class="col-12 mt-3">
                  <label for="tempat" class="form-label">Tempat</label>
                  <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $data['tempat'] ?>" placeholder="Masukan lokasi gambar" required>
                </div>



              </form>
            </div>
          </div>
        </div>
      </form>

    </div>
  </main>



  <?php
  require_once "../template/footer.php";
  ?>