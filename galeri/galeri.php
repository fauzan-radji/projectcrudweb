<?php
session_start();
require_once "../config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
  $userSession = $_SESSION["ssUser"];
  $resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
  $rowSession = mysqli_fetch_assoc($resultSession);
  $idSession = $rowSession["id"];
}

$title = "Galeri";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2">Galeri</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../">Home</a></li>
        <li class="breadcrumb-item active">Galeri</li>
      </ol>

      <div class="card">
        <div class="card-header">
          <span class="h5 my-2"><i class="fa-solid fa-images"></i></i> Galeri</span>

          <?php if (!isset($_SESSION["login"])) : ?>
            <?php if (isset($rowSession["level"])) : ?>
              <?php if ($rowSession["level"] === "superadmin") : ?>
                <a href="<?= $main_url ?>galeri/add-galeri" class="btn btn-sm btn-success float-end"><i class="fa-solid fa-square-plus"></i> Tambah Data</a>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>

        </div>
        <div class="card-body">
          <table class="table table-hover" id="datatablesSimple">
            <thead>

              <tr>
                <th scope="col">No</th>
                <th scope="col">
                  <center>Gambar</center>
                </th>
                <th scope="col">
                  <center>Judul</center>
                </th>
                <th scope="col">
                  <center>Sumber</center>
                </th>
                <th scope="col">
                  <center>Tempat</center>
                </th>

                <?php if (!isset($_SESSION["login"])) : ?>
                  <?php if (isset($rowSession["level"])) : ?>
                    <?php if ($rowSession["level"] === "superadmin") : ?>
                      <th scope="col">
                        <center>Aksi</center>
                      </th>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
              </tr>

            </thead>
            <tbody>

              <?php
              $no = 1;
              $queryGaleri = mysqli_query($koneksi, "SELECT * FROM tbl_galeri");
              while ($data = mysqli_fetch_array($queryGaleri)) { ?>

                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td align="center"><img src="../assets/images/<?= $data['gambar'] ?>" alt="" width="90px"></td>
                  <td align="center"><?= $data['judul'] ?></td>
                  <td align="center"><?= $data['sumber'] ?></td>
                  <td align="center"><?= $data['tempat'] ?></td>

                  <?php if (!isset($_SESSION["login"])) : ?>
                    <?php if (isset($rowSession["level"])) : ?>
                      <?php if ($rowSession["level"] === "superadmin") : ?>
                        <td align="center">

                          <a href="edit-galeri?id_galeri=<?= $data['id_galeri'] ?>" class="btn btn-sm btn-warning" title="Update Galeri"><i class="fa-solid fa-pen"></i></a>

                          <a href="hapus-galeri?id_galeri=<?= $data['id_galeri'] ?>&gambar=<?= $data['gambar'] ?>" class="btn btn-sm btn-danger" title="Hapus Galeri" onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </tr>

              <?php } ?>

            </tbody>
          </table>

        </div>
      </div>

    </div>
  </main>



  <?php
  require_once "../template/footer.php";
  ?>