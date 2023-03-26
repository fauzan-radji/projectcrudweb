<?php

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  global $user;

  echo 'Edit Akun | ' . $user['nama'];
}

function main()
{
  global $user;
?>
  <form action="<?= route('/user/update') ?>" method="post" enctype="multipart/form-data">
    <section class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <a href="<?= route('/user') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Kembali</a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <label for="nama">Nama</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $user['nama'] ?>" required>
              </div>

              <div class="col-md-4">
                <label for="username">Username</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $user['username'] ?>" required>
              </div>

              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 mb-3">
                <img id="preview" class="img-fluid" src="<?= uploads($user['gambar']) ?>" alt="<?= $user['nama'] ?>">
              </div>
              <div class="col-12 text-center">
                <label class="btn btn-primary" for="gambar">Pilih Gambar</label>
                <input type="file" class="d-none" name="gambar" id="gambar">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
    '<a href="' . route('/user') . '">Akun</a>' => false,
    '<a href="' . route('/user') . '">Akun Saya</a>' => false,
    'Edit Profil' => true,
  ]
]);
