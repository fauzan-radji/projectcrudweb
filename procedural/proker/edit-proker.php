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

$title = "Update Program Kerja";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id_proker = $_GET['id_proker'];

$proker = mysqli_query($koneksi, "SELECT * FROM tbl_proker WHERE id_proker = '$id_proker'");

$data = mysqli_fetch_array($proker);


?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Update Program Kerja</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="./proker">Program Kerja</a></li>
        <li class="breadcrumb-item active">Update Program Kerja</li>
      </ol>

      <form action="proses-proker" method="POST">
        <input type="hidden" name="id_proker" value="<?= $data['id_proker'] ?>">
        <div class="card">



          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Update Program</span>
            <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="row g-3">
                <div class="col">
                  <label for="namakeg" class="form-label">Nama Program</label>
                  <input type="text" class="form-control" name="namakeg" value="<?= $data['namakeg'] ?>" placeholder="Masukan nama program" required>
                </div>
                <div class="col">
                  <label for="tujuankeg" class="form-label">Tujuan Program</label>
                  <input type="text" class="form-control" name="tujuankeg" value="<?= $data['tujuankeg'] ?>" placeholder="Masukan tujuan pprogram" required>
                </div>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="sasarankeg" class="form-label">Sasaran Program</label>
                  <input type="text" class="form-control" name="sasarankeg" value="<?= $data['sasarankeg'] ?>" placeholder="Masukan sasaran program" required>
                </div>
                <div class="col">
                  <label for="danakeg" class="form-label">Sumber Dana</label>
                  <input type="text" class="form-control" name="danakeg" value="<?= $data['danakeg'] ?>" placeholder="Masukan sumber dana" required>
                </div>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="waktukeg" class="form-label">Waktu</label>
                  <input type="text" class="form-control" name="waktukeg" value="<?= date('d/m/y', strtotime($data['waktukeg'])) ?>" placeholder="Masukan waktu pelaksanaan" required>
                </div>
                <div class="col">
                  <label for="tempatkeg" class="form-label">Tempat</label>
                  <input type="text" class="form-control" name="tempatkeg" value="<?= $data['tempatkeg'] ?>" placeholder="Masukan lokasi program" required>
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