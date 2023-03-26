<?php

use function Core\extend;

function title()
{
  echo 'Login';
}

function form()
{
?>
  <form action="/authenticate" method="post" class="login100-form validate-form p-b-33 p-t-5">
    <div class="wrap-input100 validate-input" data-validate="Masukkan username">
      <input class="input100" type="text" name="username" placeholder="Username">
      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
      <input class="input100" type="password" name="pass" placeholder="Password">
      <span class="focus-input100" data-placeholder="&#xe80f;"></span>
    </div>

    <div class="container-login100-form-btn m-t-32">
      <button type="submit" class="login100-form-btn">
        Login
      </button>
    </div>
  </form>
<?php
}

extend('auth');
