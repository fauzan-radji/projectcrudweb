<?php

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Edit Berita';
}

function main()
{
  global $berita;
?>
  <form action="<?= route("/berita/{$berita['id_berita']}/update") ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Cover <?= $berita['judul'] ?></h4>
            <a href="<?= route('/berita') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar berita</a>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="form-body">
                <div class="row">
                  <div class="col">
                    <img class="img-fluid" src="<?= uploads($berita['gambar']) ?>" alt="<?= $berita['judul'] ?>">
                  </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                  <label for="gambar" class="btn btn-primary">Pilih Cover</label>
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
            <h4>Data <?= $berita['judul'] ?></h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="mb-3">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Berita" value="<?= $berita['judul'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="isiberita">Isi Berita</label>
                <input type="text" class="form-control" name="isiberita" id="isiberita" placeholder="Masukkan Isi Berita" value="<?= $berita['isiberita'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Berita" value="<?= date('Y-m-d', strtotime($berita['tanggal'])) ?>" required />
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

extend('dashboard', [
  'breadcrumb' => [
    '<a href="' . route('/berita') . '">Berita</a>' => false,
    'Edit Berita' => true,
  ]
]);
