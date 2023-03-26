<?php

require_once "../config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
  $userSession = $_SESSION["ssUser"];
  $resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

if ($rowSession["level"] === "user") {
  header("Location:$main_url");
  exit;
}


$title = "Tambah User";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = '';
}

$alert = '';
if ($msg == 'cancel') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Tambah user gagal, username sudah digunakan..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($msg == 'notimage') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> File yang anda upload bukan gambar..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($msg == 'oversize') {
  $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-triangle-exclamation"></i> Ukuran gambar max 1MB..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if ($msg == 'added') {
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Tambah User Berhasil!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Tambah User</h1>
      <ol class="breadcrumb mb-4">

        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Tambah User</li>
      </ol>
      <form action="proses-user.php" method="POST" enctype="multipart/form-data">

        <?php

        if ($msg !== '') {
          echo $alert;
        }
        ?>

        <div class="card">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah User</span>
            <button type="submit" id="simpan" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" id="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>

          <div class="card-body">
            <div class="row mt-4">
              <div class="col-8">
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="30" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="username" name="username" maxlength="30" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="password" name="password" maxlength="255" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                  <div class="col-sm-9">
                    <input type="password" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="password2" name="password2" maxlength="255" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="level" class="col-sm-2 col-form-label">Level Akun</label>
                  <div class="col-sm-9">
                    <select name="level" id="level" class="form-control">
                      <option value="user">User</option>
                      <option value="superadmin">Super Admin</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-4 text-center px-5">
                <img src="../assets/images/default.png" alt="gambaruser" class="mb-3" width="40%">
                <input type="file" name="image" class="form-control form-control-sm">
                <small class="text-secondary">Pilih foto PNG, JPG atau JPEG maximal 1 MB</small>
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