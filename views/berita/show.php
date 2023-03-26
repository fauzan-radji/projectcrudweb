<?php

use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Detail Berita';
}

function main()
{
  global $berita;
?>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <img class="img-fluid" src="<?= uploads($berita['gambar']) ?>" alt="<?= $berita['judul'] ?>">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <a href="<?= route('/berita') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar berita</a>
            <table class="table mt-3">
              <tr>
                <th>Judul</th>
                <th>:</th>
                <td><?= $berita['judul'] ?></td>
              </tr>
              <tr>
                <th>Isi Berita</th>
                <th>:</th>
                <td><?= $berita['isiberita'] ?></td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <th>:</th>
                <td><?= date('j F Y', strtotime($berita['tanggal'])) ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}

extend('dashboard', [
  'breadcrumb' => [
    '<a href="' . route('/berita') . '">Berita</a>' => false,
    'Detail Berita' => true,
  ]
]);
