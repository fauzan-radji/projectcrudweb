<?php

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
  echo 'Edit Event';
}

function main()
{
  global $event;
?>
  <form action="<?= route("/event/{$event['id_event']}/update") ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="mb-3">Gambar <?= $event['judul'] ?></h4>
            <a href="<?= route('/event') ?>" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"><i class="bi bi-arrow-left d-flex align-items-center"></i> Ke daftar event</a>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="form-body">
                <div class="row">
                  <div class="col">
                    <img id="preview" class="img-fluid" src="<?= uploads($event['gambar']) ?>" alt="<?= $event['judul'] ?>">
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
            <h4>Data <?= $event['judul'] ?></h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="mb-3">
                <label for="judul">Nama Event</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Nama Event" value="<?= $event['judul'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" id="status" placeholder="Masukkan Status Event" value="<?= $event['status'] ?>" required />
              </div>

              <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Event" value="<?= date('Y-m-d', strtotime($event['tanggal'])) ?>" required />
              </div>

              <div class="mb-3">
                <label for="isievent">Deskripsi</label>
                <textarea class="form-control" name="isievent" id="isievent" placeholder="Masukkan Deskripsi Event" required><?= $event['isievent'] ?></textarea>
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
    '<a href="' . route('/event') . '">Event</a>' => false,
    'Edit Event' => true,
  ]
]);
