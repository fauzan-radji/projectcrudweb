<?php

session_start();

session_unset();
$_SESSION = [];


header('location: login');
exit;
