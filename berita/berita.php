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

$title = "Berita";
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
        <li class="breadcrumb-item active">Berita</li>
      </ol>

      <div class="card">
        <div class="card-header">
          <span class="h5 my-2"><i class="fa-solid fa-chart-bar"></i> Berita</span>

          <?php if (!isset($_SESSION["login"])) : ?>
            <?php if (isset($rowSession["level"])) : ?>
              <?php if ($rowSession["level"] === "superadmin") : ?>
                <a href="<?= app_url('berita/add-berita') ?>" class="btn btn-sm btn-success float-end"><i class="fa-solid fa-square-plus"></i> Tambah Berita</a>
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
                  <center>Judul</center>
                </th>
                <th scope="col">
                  <center>Cover</center>
                </th>
                <th scope="col">
                  <center>Isi Berita</center>
                </th>
                <th scope="col">
                  <center>Tanggal</center>
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
              $queryBerita = mysqli_query($koneksi, "SELECT * FROM tbl_berita");
              while ($data = mysqli_fetch_array($queryBerita)) { ?>

                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $data['judul'] ?></td>
                  <td align="center"><img src="../assets/images/<?= $data['gambar'] ?>" alt="" width="90px"></td>
                  <td><?= $data['isiberita'] ?></td>
                  <td align="center"><?= date('d/m/y', strtotime($data['tanggal'])) ?></td>

                  <?php if (!isset($_SESSION["login"])) : ?>
                    <?php if (isset($rowSession["level"])) : ?>
                      <?php if ($rowSession["level"] === "superadmin") : ?>
                        <td align="center">

                          <a href="edit-berita?id_berita=<?= $data['id_berita'] ?>" class="btn btn-sm btn-warning" title="Update Berita"><i class="fa-solid fa-pen"></i></a>

                          <a href="hapus-berita?id_berita=<?= $data['id_berita'] ?>" class="btn btn-sm btn-danger" title="Hapus Berita" onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i class="fa-solid fa-trash"></i></a>
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