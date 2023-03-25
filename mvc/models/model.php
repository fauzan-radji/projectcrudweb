<?php

require_once 'user.php';

function model_all($model)
{
  $model = $model . '_all';
  return $model();
}

function model_find($model, $id)
{
  $model = $model . '_find';
  return $model($id);
}
