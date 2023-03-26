<?php

use function Core\extend;
use function Core\route;

function title()
{
  echo 'Login';
}

function form()
{
?>
  <form action="<?= route('/authenticate') ?>" method="post" class="login100-form validate-form p-b-33 p-t-5">
    <div class="wrap-input100 validate-input" data-validate="Masukkan username">
      <input class="input100" type="text" name="username" placeholder="Username" autofocus>
      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
      <input class="input100" type="password" name="password" placeholder="Password">
      <span class="focus-input100" data-placeholder="&#xe80f;"></span>
    </div>

    <div class="container-login100-form-btn m-t-32">
      <button type="submit" class="login100-form-btn">Login</button>
    </div>

    <div class="text-center mt-4">
      <a href="<?= route('/') ?>" style="font-size: 1rem; color: #d41872; text-decoration: underline;">Dashboard</a>
    </div>
  </form>

<?php
}

extend('auth');
