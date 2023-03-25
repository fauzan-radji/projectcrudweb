<?php

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
      <div class="card-header">Program Kerja</div>
      <div class="card-body">
        <table class="table" id="table-proker">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Program</th>
              <th>Tujuan</th>
              <th>Sasaran</th>
              <th>Sumber Dana</th>
              <th>Waktu</th>
              <th>Tempat</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($prokers as $proker) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $proker['namakeg'] ?></td>
                <td><?= $proker['tujuankeg'] ?></td>
                <td><?= $proker['sasarankeg'] ?></td>
                <td><?= $proker['danakeg'] ?></td>
                <td><?= $proker['waktukeg'] ?></td>
                <td><?= $proker['tempatkeg'] ?></td>
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
