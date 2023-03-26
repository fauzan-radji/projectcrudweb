<?php

use function Core\extend;
use function Core\route;

function title()
{
  echo 'Edit Proker';
}

function main()
{
  global $proker;
?>
  <div class="card">
    <div class="card-header">
      <h4 class="mb-3">Data <?= $proker['namakeg'] ?></h4>
      <a href="<?= route('/proker') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar proker</a>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" action="<?= route("/proker/{$proker['id_proker']}/update") ?>" method="post">
          <div class="form-body">
            <div class="row">
              <div class="col-md-2">
                <label for="namakeg">Nama Program</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="namakeg" id="namakeg" placeholder="Masukkan Nama Program" value="<?= $proker['namakeg'] ?>" required />
              </div>

              <div class="col-md-2">
                <label for="tujuankeg">Tujuan Program</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="tujuankeg" id="tujuankeg" placeholder="Masukkan Tujuan Program" value="<?= $proker['tujuankeg'] ?>" required />
              </div>

              <div class="col-md-2">
                <label for="sasarankeg">Sasaran Program</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="sasarankeg" id="sasarankeg" placeholder="Masukkan Sasaran Program" value="<?= $proker['sasarankeg'] ?>" required />
              </div>

              <div class="col-md-2">
                <label for="danakeg">Sumber Dana</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="danakeg" id="danakeg" placeholder="Masukkan Sumber Dana" value="<?= $proker['danakeg'] ?>" required />
              </div>

              <div class="col-md-2">
                <label for="waktukeg">Waktu</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="date" class="form-control" name="waktukeg" id="waktukeg" placeholder="Masukkan Waktu" value="<?= date('Y-m-d', strtotime($proker['waktukeg'])) ?>" required />
              </div>

              <div class="col-md-2">
                <label for="tempatkeg">Tempat</label>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" class="form-control" name="tempatkeg" id="tempatkeg" placeholder="Masukkan Tempat" value="<?= $proker['tempatkeg'] ?>" required />
              </div>

              <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                  Simpan
                </button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                  Reset
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
}

extend('dashboard');
