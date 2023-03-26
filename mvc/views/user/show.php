<?php

use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  global $user;

  echo 'Akun | ' . $user['nama'];
}

function main()
{
  global $user;
?>
  <section class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <a href="<?= route("/user/edit") ?>" class="btn icon icon-left btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-person d-flex align-items-center"></i> Edit Profil</a>
          <a href="#" class="btn icon icon-left btn-outline-secondary d-inline-flex align-items-center gap-2"><i class="bi bi-pencil d-flex align-items-center"></i> Edit Password</a>
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Nama</th>
              <th>:</th>
              <td><?= $user['nama'] ?></td>
            </tr>

            <tr>
              <th>Username</th>
              <th>:</th>
              <td><?= $user['username'] ?></td>
            </tr>

            <tr>
              <th>Level</th>
              <th>:</th>
              <td><?= $user['level'] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <img src="<?= uploads($user['gambar']) ?>" alt="<?= $user['nama'] ?>">
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

extend('dashboard');
