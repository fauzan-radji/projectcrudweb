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

$title = "Program Kerja";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
  <main class="print-selection">
    <div class="container-fluid px-4">
      <h1 class="mt-2">Program Kerja</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="../">Home</a></li>
        <li class="breadcrumb-item active">Program Kerja</li>
      </ol>

      <div class="card">
        <div class="card-header">
          <span class="h5 my-2"><i class="fa-solid fa-chart-bar"></i> Program Kerja</span>
          <?php if (!isset($_SESSION["login"])) : ?>
            <?php if (isset($rowSession["level"])) : ?>
              <?php if ($rowSession["level"] === "superadmin") : ?>
                <a href="<?= $main_url ?>proker/add-proker" class="btn btn-sm btn-success float-end" style="margin-left:10px;"><i class="fa-solid fa-square-plus"></i> Tambah Program</a>
              <?php endif; ?>
              <?php if ($rowSession["level"] === "superadmin" or $rowSession["level"] === "direktur") : ?>
                <a href="#" class="btn btn-sm btn-success float-end" onclick="window.print();"><i class="fa-solid fa-square-plus"></i> Print/Cetak PDF</a>
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
                  <center>Nama Program</center>
                </th>
                <th scope="col">
                  <center>Tujuan</center>
                </th>
                <th scope="col">
                  <center>Sasaran</center>
                </th>
                <th scope="col">
                  <center>Sumber Dana</center>
                </th>
                <th scope="col">
                  <center>Waktu</center>
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
              $queryProker = mysqli_query($koneksi, "SELECT * FROM tbl_proker");
              while ($data = mysqli_fetch_array($queryProker)) { ?>

                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $data['namakeg'] ?></td>
                  <td><?= $data['tujuankeg'] ?></td>
                  <td><?= $data['sasarankeg'] ?></td>
                  <td><?= $data['danakeg'] ?></td>
                  <td><?= date('d/m/y', strtotime($data['waktukeg'])) ?></td>
                  <td><?= $data['tempatkeg'] ?></td>


                  <?php if (!isset($_SESSION["login"])) : ?>
                    <?php if (isset($rowSession["level"])) : ?>
                      <?php if ($rowSession["level"] === "superadmin") : ?>
                        <td align="center">

                          <a href="edit-proker?id_proker=<?= $data['id_proker'] ?>" class="btn btn-sm btn-warning" title="Update Program"><i class="fa-solid fa-pen"></i></a>

                          <a href="hapus-proker?id_proker=<?= $data['id_proker'] ?>" class="btn btn-sm btn-danger" title="Hapus Program" onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i class="fa-solid fa-trash"></i></a>
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