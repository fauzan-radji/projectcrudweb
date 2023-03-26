<?php

use function Core\asset;
use function Core\extend;
use function Core\route;

function style()
{
?>
  <link rel="stylesheet" href="<?= asset('css/shared/iconly.css') ?>" />
<?php
}

function title()
{
  echo 'Dashboard';
}

function main()
{
  global $proker, $berita, $event, $user;
?>
  <section class="row">
    <div class="col-6 col-md-6 col-lg-3">
      <a href="<?= route('/proker') ?>">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon purple mb-2">
                  <i class="iconly-boldDocument"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Program Kerja</h6>
                <h6 class="font-extrabold mb-0"><?= $proker ?></h6>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <a href="<?= route('/berita') ?>">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon blue mb-2">
                  <i class="iconly-boldActivity"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Berita</h6>
                <h6 class="font-extrabold mb-0"><?= $berita ?></h6>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <a href="<?= route('/event') ?>">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon green mb-2">
                  <i class="iconly-boldCalendar"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Event</h6>
                <h6 class="font-extrabold mb-0"><?= $event ?></h6>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
      <a href="<?= route('/user') ?>">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon red mb-2">
                  <i class="iconly-boldProfile"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">User</h6>
                <h6 class="font-extrabold mb-0"><?= $user ?></h6>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </section>
<?php
}

function script()
{
?>
  <!-- Need: Apexcharts -->
  <script src="<?= asset('extensions/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= asset('js/pages/dashboard.js') ?>"></script>
<?php
}


extend('dashboard', [
  'breadcrumb' => [
    'Dashboard' => true,
  ]
]);
