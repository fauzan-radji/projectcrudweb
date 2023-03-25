<?php

$users = [
  [
    'id' => 1,
    'nama' => 'Fauzan Radji',
    'pekerjaan' => 'Programmer'
  ],
  [
    'id' => 2,
    'nama' => 'Agung Saputra',
    'pekerjaan' => 'Wengdev'
  ],
  [
    'id' => 3,
    'nama' => 'Dhani Panther',
    'pekerjaan' => 'Backend'
  ]
];

function user_all()
{
  global $users;
  return $users;
}

function user_find($id)
{
  global $users;
  foreach ($users as $user)
    if ($user['id'] == $id) return $user;

  return [];
}
