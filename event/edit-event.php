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
  header("Location:$main_url");
  exit;
}


$title = " Tambah Event";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id_event = $_GET['id_event'];

$event = mysqli_query($koneksi, "SELECT * FROM tbl_event WHERE id_event = '$id_event");

$data = mysqli_fetch_array($event);

?>


<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Event</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../">Home</a></li>
        <li class="breadcrumb-item"><a href="./event">Event</a></li>
        <li class="breadcrumb-item active">Update Event</li>
      </ol>

      <form action="proses-event" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_event" value="<?= $data['id_event'] ?>">
        <div class="card">

          <div class="card col-9 bordered">
            <div class="card-header">
              <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Event</span>
              <button type="submit" name="update" id="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>

            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <label for="judul" class="form-label">Nama Event</label>
                </div> <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul'] ?>" placeholder="Masukan Nama Event" required>

                <div class="col mt-2">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" placeholder="Masukan waktu pelaksanaan" required>
                </div>
                <div class="col mt-2">
                  <label for="status" class="form-label">Status</label>
                  <input type="text" class="form-control" id="status" name="status" value="<?= $data['status'] ?>" placeholder="Masukan status event" required>
                </div>
              </div>
              <div class="col mt-2">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="isievent" name="isievent" raw="3"><?= $data['isievent'] ?></textarea>
              </div>


            </div>
          </div>
      </form>
    </div>
  </main>

  <?php

  require_once "../template/footer.php";

  ?>