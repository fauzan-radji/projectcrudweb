<?php

function proker()
{
  $prokers = Proker::getAll();

  view('proker/index', ['prokers' => $prokers]);
}
