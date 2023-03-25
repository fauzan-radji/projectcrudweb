<?php

function user_show($data)
{
  $user = model_find('user', $data['id']);
  view('user', $user);
}
