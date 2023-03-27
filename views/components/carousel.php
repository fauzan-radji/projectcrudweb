<?php

use function Core\route;
use function Core\truncate;
use function Core\uploads;


?><div id="carousel" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <?php for ($no = 0; $no < count($beritas); $no++) : ?>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $no ?>" <?= $no === 0 ? 'class="active"' : '' ?> aria-current="true" aria-label="<?= $beritas[$no]['judul'] ?>"></button>
    <?php endfor ?>
  </div>
  <div class="carousel-inner rounded-0">
    <?php foreach ($beritas as $berita) : ?>
      <div class="carousel-item <?= $berita === $beritas[0] ? 'active' : '' ?>">
        <img src="<?= uploads($berita['gambar']) ?>" class="d-block w-100" style="aspect-ratio: 7/3; object-fit: cover" alt="<?= $berita['judul'] ?>" />
        <div class="carousel-caption d-none d-md-block" style="
              background-image: radial-gradient(
                closest-side,
                #0006,
                transparent
              );
            ">
          <h5><?= $berita['judul'] ?></h5>
          <p><?= truncate($berita['isiberita'], 80) ?></p>
          <a href="<?= route("/berita/{$berita['id_berita']}/read") ?>" class="btn icon btn-success my-2 ms-auto d-inline-flex align-items-center gap-2">Selengkapnya<i class="bi bi-arrow-right d-flex align-items-center"></i></a>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>