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

if ($rowSession["level"] === "direktur") {
	header("Location: " . app_url());
	exit;
}

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
	// ambil value yang diposting
	$id			= $_POST['id'];
	$nama		= trim(htmlspecialchars($_POST['nama']));
	$kabupaten	= trim(htmlspecialchars($_POST['kabupaten']));
	$provinsi	= trim(htmlspecialchars($_POST['provinsi']));
	$alamat		= trim(htmlspecialchars($_POST['alamat']));
	$telepon	= trim(htmlspecialchars($_POST['telepon']));
	$kodepos	= trim(htmlspecialchars($_POST['kodepos']));
	$email		= trim(htmlspecialchars($_POST['email']));
	$visi		= trim(htmlspecialchars($_POST['visi']));
	$misi		= trim(htmlspecialchars($_POST['misi']));
	$gbr		= trim(htmlspecialchars($_POST['gbrLama']));


	// cek gambar yang diupload
	if ($_FILES['image']['error'] === 4) {
		$gbrInstansi = $gbr;
	} else {
		$url = 'add-profil.php';
		$gbrInstansi = uploadimg($url);
		@unlink('../assets/images/' . $gbr);
	}

	// update data
	mysqli_query($koneksi, "UPDATE tbl_profil SET
							nama = '$nama',
							kabupaten = '$kabupaten',
							provinsi = '$provinsi',
							alamat = '$alamat',
							telepon = '$telepon',
							kodepos = '$kodepos',
							email = '$email',
							visi ='$visi',
							misi = '$misi',
							gambar = '$gbrInstansi'
							WHERE id= $id
							");
	header("location:add-profil.php?msg=updated");
	return;
}
