<?php

use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Detail Event';
}

function main()
{
  global $event;
?>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <img class="img-fluid" src="<?= uploads($event['gambar']) ?>" alt="<?= $event['judul'] ?>">
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <a href="<?= route('/event') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar event</a>
            <table class="table mt-3">
              <tr>
                <th>Nama Event</th>
                <td>:</td>
                <td><?= $event['judul'] ?></td>
              </tr>
              <tr>
                <th>Isi Event</th>
                <td>:</td>
                <td><?= $event['isievent'] ?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td>:</td>
                <td><?= $event['status'] ?></td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>:</td>
                <td><?= date('j F Y', strtotime($event['tanggal'])) ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}

extend('dashboard');
