<?php

use function Core\extend;

function title()
{
?>
  Dashboard
<?php
}

function main()
{
?>
  <section class="row">
    <div class="col">
      <h1>Hello World</h1>
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
