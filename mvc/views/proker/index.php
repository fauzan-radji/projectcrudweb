<?php

use function Core\asset;
use function Core\extend;
use function Core\route;

function title()
{
?>
  Program Kerja
<?php
}

function style()
{
?>
  <link rel="stylesheet" href="<?= asset('css/pages/fontawesome.css') ?>" />
  <link rel="stylesheet" href="<?= asset('extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/pages/datatables.css') ?>" />
<?php
}

function main()
{
  global $prokers;
?>
  <section class="section">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <span>Program Kerja</span>
        <a class="btn btn-sm btn-primary icon icon-left d-flex align-items-center gap-2" href="<?= route('/proker/create') ?>">
          <i class="bi bi-plus-square d-flex align-items-center"></i>
          <span>Tambah Proker</span>
        </a>
      </div>
      <div class="card-body">
        <table class="table" id="table-proker">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Program</th>
              <!-- <th>Tujuan</th>
              <th>Sasaran</th>
              <th>Sumber Dana</th> -->
              <th>Waktu</th>
              <th>Tempat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($prokers as $proker) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $proker['namakeg'] ?></td>
                <!-- <td><?= $proker['tujuankeg'] ?></td>
                <td><?= $proker['sasarankeg'] ?></td>
                <td><?= $proker['danakeg'] ?></td> -->
                <td><?= $proker['waktukeg'] ?></td>
                <td><?= $proker['tempatkeg'] ?></td>
                <td>
                  <a href="<?= route("/proker/{$proker['id_proker']}") ?>" class="badge text-bg-info rounded-3"><i class="bi bi-info-circle"></i></a>
                  <button class="badge text-bg-warning rounded-3 border-0"><i class="bi bi-pencil"></i></button>
                  <button class="badge text-bg-danger rounded-3 border-0"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
<?php
}

function script()
{
?>
  <script src="<?= asset('extensions/jquery/jquery.min.js') ?>"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
  <script src="<?= asset('js/tables/proker.js') ?>"></script>
<?php
}

extend('dashboard');
