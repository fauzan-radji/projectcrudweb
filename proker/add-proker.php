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

if ($rowSession["level"] === "user") {
  header("Location: " . app_url());
  exit;
}

$title = " Tambah Program Kerja";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>


<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Program Kerja</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="./proker">Program Kerja</a></li>
        <li class="breadcrumb-item active">Tambah Program Kerja</li>
      </ol>

      <form action="proses-proker" method="POST">
        <div class="card">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Program</span>
            <button type="submit" name="simpan" id="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="row g-3">
                <div class="col">
                  <label for="namakeg" class="form-label">Nama Program</label>
                  <input type="text" class="form-control" id="namakeg" name="namakeg" value="" placeholder="Masukan nama program" required>
                </div>
                <div class="col">
                  <label for="tujuankeg" class="form-label">Tujuan Program</label>
                  <input type="text" class="form-control" id="tujuankeg" name="tujuankeg" value="" placeholder="Masukan tujuan pprogram" required>
                </div>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="sasarankeg" class="form-label">Sasaran Program</label>
                  <input type="text" class="form-control" id="sasarankeg" name="sasarankeg" value="" placeholder="Masukan sasaran program" required>
                </div>
                <div class="col">
                  <label for="danakeg" class="form-label">Sumber Dana</label>
                  <input type="text" class="form-control" id="danakeg" name="danakeg" value="" placeholder="Masukan sumber dana" required>
                </div>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="waktukeg" class="form-label">Waktu</label>
                  <input type="date" class="form-control" id="waktukeg" name="waktukeg" value="" placeholder="Masukan waktu pelaksanaan" required>
                </div>
                <div class="col">
                  <label for="tempatkeg" class="form-label">Tempat</label>
                  <input type="text" class="form-control" id="tempatkeg" name="tempatkeg" value="" placeholder="Masukan lokasi program" required>
                </div>
              </div>



            </div>
          </div>
      </form>
    </div>
  </main>

  <?php

  require_once "../template/footer.php";

  ?>