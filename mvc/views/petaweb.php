<?php

use function Core\extend;

function title()
{
  echo 'Peta';
}

function main()
{
?>
  <section class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <iframe src="http://localhost/projectcrudweb-maps" frameborder="0" style="width: 100%; aspect-ratio: 16/9;"></iframe>
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
