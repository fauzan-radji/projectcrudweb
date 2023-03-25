<?php

session_start();

require_once "../config.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username'");
	$data = mysqli_fetch_array($query);

	if (mysqli_num_rows($query) >= 1) {
		if (password_verify($password, $data['password'])) {
			//login valid

			//Session Untuk Membatasi Hak Akses
			$_SESSION['ssLogin'] = true;
			$_SESSION['ssUser'] = $username;

			header('location:../');
		} else {
			//password salah;
			header('location:login?msg=Password salah');
		}
	} else {
		//username salah;
		header('location:login?msg=Username salah');
	}
}
