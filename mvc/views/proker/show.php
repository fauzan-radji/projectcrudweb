<?php

use function Core\extend;
use function Core\route;

function title()
{
  echo 'Detail Proker';
}

function main()
{
  global $proker;
?>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <a href="<?= route('/proker') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar proker</a>
            <table class="table mt-3">
              <tr>
                <th>Nama Program</th>
                <td>:</td>
                <td><?= $proker['namakeg'] ?></td>
              </tr>
              <tr>
                <th>Tujuan Program</th>
                <td>:</td>
                <td><?= $proker['tujuankeg'] ?></td>
              </tr>
              <tr>
                <th>Sasaran Program</th>
                <td>:</td>
                <td><?= $proker['sasarankeg'] ?></td>
              </tr>
              <tr>
                <th>Sumber Dana</th>
                <td>:</td>
                <td><?= $proker['danakeg'] ?></td>
              </tr>
              <tr>
                <th>Waktu</th>
                <td>:</td>
                <td><?= $proker['waktukeg'] ?></td>
              </tr>
              <tr>
                <th>Tempat</th>
                <td>:</td>
                <td><?= $proker['tempatkeg'] ?></td>
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
