<?php

use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Detail Galeri';
}

function main()
{
  global $galeri;
?>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <img class="img-fluid" src="<?= uploads($galeri['gambar']) ?>" alt="<?= $galeri['judul'] ?>">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <a href="<?= route('/galeri') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar galeri</a>
            <table class="table mt-3">
              <tr>
                <th>Judul</th>
                <th>:</th>
                <td><?= $galeri['judul'] ?></td>
              </tr>
              <tr>
                <th>Sumber</th>
                <th>:</th>
                <td><?= $galeri['sumber'] ?></td>
              </tr>
              <tr>
                <th>Tempat</th>
                <th>:</th>
                <td><?= $galeri['tempat'] ?></td>
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
    '<a href="' . route('/galeri') . '">Galeri</a>' => false,
    'Detail Galeri' => true,
  ]
]);
