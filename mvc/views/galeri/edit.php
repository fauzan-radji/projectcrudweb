<?php

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Edit Galeri';
}

function main()
{
  global $galeri;
?>
  <form action="<?= route("/galeri/{$galeri['id_galeri']}/update") ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Gambar <?= $galeri['judul'] ?></h4>
            <a href="<?= route('/galeri') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar galeri</a>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="form-body">
                <div class="row">
                  <div class="col">
                    <img id="preview" class="img-fluid" src="<?= uploads($galeri['gambar']) ?>" alt="<?= $galeri['judul'] ?>">
                  </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                  <label for="gambar" class="btn btn-primary">Pilih Gambar</label>
                  <input type="file" class="d-none" name="gambar" id="gambar" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Data <?= $galeri['judul'] ?></h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="mb-3">
                <label for="judul">Nama Galeri</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Nama Galeri" value="<?= $galeri['judul'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="sumber">Sumber</label>
                <input type="text" class="form-control" name="sumber" id="sumber" placeholder="Masukkan Sumber Galeri" value="<?= $galeri['sumber'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat Galeri" value="<?= $galeri['tempat'] ?>" required />
              </div>

              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                  Simpan
                </button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                  Reset
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php
}

function script()
{
?>
  <script src="<?= asset('js/imagePreview.js') ?>"></script>
  <script>
    const gambar = document.getElementById('gambar');
    const preview = document.getElementById('preview');
    imagePreview(gambar, preview);
  </script>
<?php
}

extend('dashboard', [
  'breadcrumb' => [
    '<a href="' . route('/galeri') . '">Galeri</a>' => false,
    'Edit Galeri' => true,
  ]
]);
