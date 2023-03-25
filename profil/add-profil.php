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


if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = '';
}

$alert = '';
if ($msg == 'notimage') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Update gagal, File yang anda upload bukan gambar!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($msg == 'oversize') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Ukuran gambar max 1MB..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Data Instansi berhasil diperbarui!  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


$profil = mysqli_query($koneksi, "SELECT * FROM tbl_profil WHERE id = 1");
$data = mysqli_fetch_array($profil);


?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Profil Instansi</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>

      <form action="proses-profil.php" method="POST" enctype="multipart/form-data">

        <?php

        if ($msg !== '') {
          echo $alert;
        }
        ?>
        <div class="card">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Data Instansi</span>
            <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>

          <div class="card-body">
            <div class="col-4 text-center px-5">
              <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">

              <img src="../assets/images/<?= $data['gambar'] ?>" alt="gbrInstansi" class="mb-3" width="100%">
              <input type="file" name="image" class="form-control form-control-sm">
              <small class="text-secondary">Masukan file gambar PNG, JPG atau JPEG</small>

            </div>

            <form class="row g-3 mt-6">
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <div class="col-12">
                <label for="nama" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukan nama instansi" required>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="kabupaten" class="form-label">Kabupaten</label>
                  <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $data['kabupaten'] ?>" placeholder="Masukan nama Kabupaten" required>
                </div>
                <div class="col">
                  <label for="provinsi" class="form-label">Provinsi</label>
                  <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $data['provinsi'] ?>" placeholder="Masukan nama Provinsi" required>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" raw="2"><?= $data['alamat'] ?></textarea>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="telepon" class="form-label">Telepon</label>
                  <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $data['telepon'] ?>" placeholder="Masukan nomor Telepon" required>
                </div>
                <div class="col">
                  <label for="kodepos" class="form-label">Kode Pos</label>
                  <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $data['kodepos'] ?>" placeholder="Masukan Kode Pos" required>
                </div>
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" placeholder="Masukan email instansi" required>
              </div>

              <div class="row g-3">
                <div class="col">
                  <label for="telepon" class="form-label">Visi</label>
                  <textarea class="form-control" id="visi" name="visi" raw="2"><?= $data['visi'] ?></textarea>
                </div>
                <div class="col">
                  <label for="kodepos" class="form-label">Misi</label>
                  <textarea class="form-control" id="misi" name="misi" raw="2"><?= $data['misi'] ?></textarea>
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