<?php

function users()
{
  $users = model_all('user');
  return view('users', [
    'users' => $users
  ]);
}
