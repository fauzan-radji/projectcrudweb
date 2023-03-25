<?php

session_start();
if (!isset($_SESSION['ssLogin'])) {
	header('location:../auth/login.php');
	exit;
}

require_once "../config.php";

// SESSION USER LOGIN
if (isset($_SESSION["ssLogin"])) {
	$userSession = $_SESSION["ssUser"];
	$resultSession = $koneksi->query("SELECT * FROM tbl_user WHERE username = '$userSession' ");
	$rowSession = mysqli_fetch_assoc($resultSession);
	$idSession = $rowSession["id"];
}

if ($rowSession["level"] === "user") {
	header("Location: " . app_url());
	exit;
}


// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
	// ambil value elemen yang diposting
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nama = $_POST['nama'];
	$gambar		= htmlspecialchars($_FILES['image']['name']);
	$level = $_POST['level'];

	// check confirmation password
	if ($password !== $password2) {
		echo "
		<script>
			alert('Konfirmasi password tidak sesuai!');
			document.location.href = 'add-user';
		</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	// cek username
	$cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'");
	if (mysqli_num_rows($cekUsername) > 0) {
		header("location:add-user.php?msg=cancel");
		return;
	}


	// upload gambar
	if ($gambar != null) {
		$url = 'add-user.php';
		$gambar = uploadimg($url);
	} else {
		$gambar = 'default.png';
	}


	mysqli_query($koneksi, "INSERT INTO tbl_user VALUES('','$username','$password','$nama','$gambar', '$level')");

	header("location:add-user.php?msg=added");
	return;
}
