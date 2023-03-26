<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
  <ol class="breadcrumb">
    <?php foreach ($items as $value => $active) : ?>
      <li class="breadcrumb-item <?= $active ? 'active' : '' ?>">
        <?= $value ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>