<?php

session_start();

require_once "../config.php";

$profil = mysqli_query($koneksi, "SELECT * FROM tbl_profil WHERE id = 1");
$data = mysqli_fetch_array($profil);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login</title>
  <link href="<?= $main_url ?>assets/sb-admin/css/styles.css?<?= time(); ?>" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="<?= $main_url ?>assets/images/Japesda-Gorontalo.jpg">
  <style>
    #bgLogin {
      background-image: url("../assets/images/<?= $data['gambar'] ?>");
      background-size: cover;
      background-position: center center;
    }
  </style>
</head>

<body id="bgLogin">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="card shadow-lg border-0 rounded-lg container-sign">


                <div class="card-header card-header-sign">
                  <center> <img src="../assets/images/Logo-Japesda.jpg" class="mt-4" width="23%"></center>
                  <h3 class="text-center font-weight-light my-4">Jaring Advokasi Pengelolaan sumber daya</h3>
                </div>
                <div class="card-body">

                  <?php
                  if (isset($_GET['msg'])) {
                  ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Login gagal! </strong><?php echo $_GET['msg']; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> <?php } ?>

                  <form action="proses-login" method="POST">

                    <div class="form-floating mb-3">
                      <input class="form-control" id="username" name="username" type="text" pattern="[A-Za-z0-9]{3," placeholder="Username Anda" autocomplete="off" required / autofocus>
                      <label for="username"><i class="fa-solid fa-user me-3"></i> Username</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                      <label for="password"><i class="fa-solid fa-unlock-keyhole me-3"></i> Password</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-success col-12 rounded-pill my-2">Login</button>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div>
                    <div class="text-muted small">Copyright <?= date("Y") ?> &copy; Farhan Aditya </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </main>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= $main_url ?>assets/sb-admin/js/scripts.js"></script>
</body>

</html>