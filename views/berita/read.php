<?php

use function Core\extend;
use function Core\formatTime;
use function Core\uploads;

function main()
{
  global $berita;
?>
  <div class="container my-4">
    <h2><?= $berita['judul'] ?></h2>
    <h5 class="text-muted"><?= formatTime('j F Y', $berita['tanggal']) ?></h5>

    <img class="mb-5" style="width: 100%; aspect-ratio: 7/3; object-fit: cover;" src="<?= uploads($berita['gambar']) ?>" alt="<?= $berita['judul'] ?>">

    <p><?= $berita['isiberita'] ?></p>
  </div>
<?php
}

extend('homepage');
