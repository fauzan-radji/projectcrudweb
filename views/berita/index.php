<?php

use Core\Auth;

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\truncate;
use function Core\uploads;

function title()
{
  echo 'Berita';
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
  global $beritas;
?>
  <section class="section">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <span>Berita</span>

        <?php if (Auth::is('superadmin')) : ?>
          <a class="btn btn-sm btn-primary icon icon-left d-flex align-items-center gap-2" href="<?= route('/berita/create') ?>">
            <i class="bi bi-plus-square d-flex align-items-center"></i>
            <span>Tambah Berita</span>
          </a>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Cover</th>
              <th>Isi Berita</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($beritas as $berita) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $berita['judul'] ?></td>
                <td><img src="<?= uploads($berita['gambar']) ?>" alt="<?= $berita['judul'] ?>" style="width: 200px; aspect-ratio: 16/9; object-fit: cover;"></td>
                <td><?= truncate($berita['isiberita']) ?></td>
                <td><?= date('d-m-Y', strtotime($berita['tanggal'])) ?></td>
                <td>
                  <!-- detail -->
                  <a href="<?= route("/berita/{$berita['id_berita']}") ?>" class="badge text-bg-info rounded-3"><i class="bi bi-info-circle"></i></a>

                  <?php if (Auth::is('superadmin')) : ?>
                    <!-- edit -->
                    <a href="<?= route("/berita/{$berita['id_berita']}/edit") ?>" class="badge text-bg-warning rounded-3"><i class="bi bi-pencil"></i></a>
                    <!-- delete -->
                    <a href="<?= route("/berita/{$berita['id_berita']}/destroy") ?>" onclick="sweetconfirm(event, {title: 'Apakah Anda yakin?', text: 'Tindakan ini tidak dapat diubah'}); return false;" class="badge text-bg-danger rounded-3"><i class="bi bi-trash pe-none"></i></a>
                  <?php endif; ?>
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
  <script src="<?= asset('js/table.js') ?>"></script>
<?php
}

extend('dashboard', [
  'breadcrumb' => [
    'Berita' => true,
  ]
]);
