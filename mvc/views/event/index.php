<?php

use function Core\asset;
use function Core\extend;
use function Core\route;
use function Core\uploads;

function title()
{
?>
  Event
<?php
}

function style()
{
?>
  <link rel="stylesheet" href="<?= asset('css/pages/fontawesome.css') ?>" />
  <link rel="stylesheet" href="<?= asset('extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>" />
  <link rel="stylesheet" href="<?= asset('css/pages/datatables.css') ?>" />
<?php
}

function main()
{
  global $events;
?>
  <section class="section">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <span>Event</span>
        <a class="btn btn-sm btn-primary icon icon-left d-flex align-items-center gap-2" href="<?= route('/event/create') ?>">
          <i class="bi bi-plus-square d-flex align-items-center"></i>
          <span>Tambah Event</span>
        </a>
      </div>
      <div class="card-body">
        <table class="table" id="table-event">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Event</th>
              <th>Gambar</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($events as $event) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $event['judul'] ?></td>
                <td><img src="<?= uploads($event['gambar']) ?>" alt="<?= $event['judul'] ?>" style="width: 200px; aspect-ratio: 16/9; object-fit: cover;"></td>
                <td><?= date('d-m-Y', strtotime($event['tanggal'])) ?></td>
                <td>
                  <!-- detail -->
                  <a href="<?= route("/event/{$event['id_event']}") ?>" class="badge text-bg-info rounded-3"><i class="bi bi-info-circle"></i></a>
                  <!-- edit -->
                  <a href="<?= route("/event/{$event['id_event']}/edit") ?>" class="badge text-bg-warning rounded-3"><i class="bi bi-pencil"></i></a>
                  <!-- delete -->
                  <a href="<?= route("/event/{$event['id_event']}/destroy") ?>" onclick="sweetconfirm(event); return false;" class="badge text-bg-danger rounded-3"><i class="bi bi-trash pe-none"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
<?php
}

function script()
{
?>
  <script src="<?= asset('extensions/jquery/jquery.min.js') ?>"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
  <script src="<?= asset('js/tables/event.js') ?>"></script>
  <script>
    function sweetconfirm(e) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Tindakan ini tidak dapat diubah",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = e.target.href;
        }
      })
    }
  </script>
<?php
}

extend('dashboard');
