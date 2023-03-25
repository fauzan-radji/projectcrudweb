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

// CHECK EMPTY ACCOUNT
if (empty($rowSession["id"])) {
  header("Location:../auth/logout");
  exit;
}

if (isset($_GET["cmd"])) {
  $idAccount = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_GET["cmd"])))))))));
  $queryAccountIdUrl = query("SELECT * FROM tbl_user WHERE id = '$idAccount' ")[0];
}



if (isset($_POST["save_profile"])) {
  if (updateProfile($_POST) > 0) {
    echo "
    <script>
      alert('Profil berhasil diubah!');
      document.location.href = '';
    </script>
    ";
  }
}

if (isset($_POST["save_password"])) {
  $passwordOld = $_POST["password_old"];
  if ($passwordOld !== $rowSession["password2"]) {
    echo "
    <script>
      alert('Kata sandi saat ini tidak sesuai!.');
      document.location.href = '';
    </script>
    ";
  } else {
    if (updatePassword($_POST) > 0) {
      echo "
    <script>
      alert('Password berhasil diubah! Silahkan login kembali.');
      document.location.href = '../auth/logout';
    </script>
    ";
    }
  }
}


$title = "Akun Saya";
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
  <i class="fa-solid fa-triangle-exclamation"></i> Akun Saya gagal, username sudah digunakan..
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
  <i class="fa-solid fa-circle-check"></i> Akun Saya Berhasil!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Akun Saya</h1>
      <ol class="breadcrumb mb-4">

        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Akun Saya</li>
      </ol>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($queryAccountIdUrl["id"]))))))))); ?>">
        <input type="text" hidden name="img_old" value="<?= $queryAccountIdUrl["gambar"]; ?>">
        <?php

        if ($msg !== '') {
          echo $alert;
        }
        ?>

        <div class=" card">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Ubah Profil</span>
            <button type="submit" id="save_profile" name="save_profile" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" id="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>

          <div class="card-body">
            <div class="row mt-4">
              <div class="col-8">
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="30" required value="<?= $queryAccountIdUrl["nama"]; ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="username" name="username" maxlength="30" required value="<?= $queryAccountIdUrl["username"]; ?>">
                  </div>
                </div>

              </div>
              <div class="col-4 text-center px-5">
                <img src="<?= app_url('assets/images/{$queryAccountIdUrl["gambar"]}') ?>" alt="gambaruser" class="mb-3" style="width: 100px; height:100px; border-radius:50%;object-fit: cover; border:4px solid white; box-shadow:1px 1px 5px #aaa;">
                <input type="file" name="gambar" class="form-control form-control-sm">
                <small class="text-secondary">Pilih foto PNG, JPG atau JPEG maximal 1 MB</small>
              </div>

            </div>

          </div>
        </div>

      </form>


      <form action="" method="post" enctype="multipart/form-data">
        <input type="text" hidden name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($queryAccountIdUrl["id"]))))))))); ?>">

        <?php

        if ($msg !== '') {
          echo $alert;
        }
        ?>

        <div class="card mt-4 mb-4">
          <div class="card-header">
            <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Ubah Password</span>
            <button type="submit" id="save_password" name="save_password" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" id="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
          </div>

          <div class="card-body">
            <div class="row mt-4">
              <div class="col-8">
                <div class="mb-3 row">
                  <label for="password_old" class="col-sm-2 col-form-label">Password Saat Ini</label>
                  <div class="col-sm-9">
                    <input type="password" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="password_old" name="password_old" maxlength="255" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                  <div class="col-sm-9">
                    <input type="password" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="password" name="password" maxlength="255" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                  <div class="col-sm-9">
                    <input type="password" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control" id="password2" name="password2" maxlength="255" required>
                  </div>
                </div>

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