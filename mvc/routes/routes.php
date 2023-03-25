<?php
define('ROUTES', [
  '/' => 'home',
  '/about/{nama}/{pekerjaan}' => 'about',
  '/welcome/{nama}' => 'welcome',
  '/users' => 'users',
  '/users/{id}' => 'user_show'
]);

define('DEFAULT_CONTROLLER', '_404');
