<?php

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
  <section class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <a href="<?= route('/user') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Kembali</a>
        </div>
        <div class="card-body">
          <form action="<?= route('/user/updatepass') ?>" method="post">
            <div class="row">
              <div class="col-md-4">
                <label for="oldPassword">Password Saat Ini</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Masukkan Password Saat Ini" required>
              </div>

              <div class="col-md-4">
                <label for="newPassword">Password Baru</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Masukkan Password Baru" required>
              </div>

              <div class="col-md-4">
                <label for="confirmPassword">Konfirmasi Password Baru</label>
              </div>
              <div class="col-md-8 form-group">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Password Baru" required>
              </div>

              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php
}

function script()
{
?>
  <script>
    console.log('hello world')
  </script>
<?php
}

extend('dashboard', [
  'breadcrumb' => [
    '<a href="' . route('/user') . '">Akun</a>' => false,
    '<a href="' . route('/user') . '">Akun Saya</a>' => false,
    'Edit Password' => true,
  ]
]);
