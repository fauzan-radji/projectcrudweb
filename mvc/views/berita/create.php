<?php

use function Core\asset;
use function Core\extend;
use function Core\route;

function title()
{
  echo 'Tambah Berita';
}

function main()
{
?>
  <form action="<?= route("/berita/store") ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Cover Berita</h4>
            <a href="<?= route('/berita') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar berita</a>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="form-body">
                <div class="row">
                  <div class="col">
                    <img class="img-fluid" src="<?= asset('images/default.png') ?>">
                  </div>
                </div>
                <div class=" d-flex justify-content-center mt-3">
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
            <h4>Tambah Data Berita</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Berita" required />
              </div>

              <div class="mb-3">
                <label for="isiberita">Isi</label>
                <input type="text" class="form-control" name="isiberita" id="isiberita" placeholder="Masukkan Isi Berita" required />
              </div>

              <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Berita" required />
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

extend('dashboard');
