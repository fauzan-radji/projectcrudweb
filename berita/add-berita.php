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


$title = "Tambah Instansi";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Berita</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../">Home</a></li>
        <li class="breadcrumb-item"><a href="./berita">Berita</a></li>
        <li class="breadcrumb-item active">Tambah Berita</li>
      </ol>

      <form action="proses-berita" method="POST" enctype="multipart/form-data">

        <div class="card col-8">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Tambah Berita</span>
            <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-4 text-center px-5">
                <input type="hidden" name="gbrberitaLama" value="<?= $data['gambar'] ?>">

                <img src="../assets/images/default-img.png" alt="gbrBerita" class="mb-3" width="100%">
                <input type="file" name="image" class="form-control form-control-sm">
                <small class="text-secondary">Masukan file gambar PNG, JPG atau JPEG</small>

              </div>

              <form class="row g-3 mt-6">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">


                <div class="col-12">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="" placeholder="Masukan nama instansi" required>
                </div>

                <div class="col-12">
                  <label for="isiberita" class="form-label">Isi Berita</label>
                  <textarea class="form-control" id="isiberita" name="isiberita" raw="30"></textarea>
                </div>

                <div class="col-12">
                  <label for="tanggal" class="form-label">Tanggal Post</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="Masukan nama instansi" required>
                </div>

            </div>
      </form>
    </div>
</div>
</form>
</div>
</main>



<?php
require_once "../template/footer.php";
?>