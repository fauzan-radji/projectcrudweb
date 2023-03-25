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

if (isset($_POST['simpan'])) {
	$id_galeri	= $_POST['id_galeri'];
	$gambar		= htmlspecialchars($_FILES['image']['name']);
	$judul		= htmlspecialchars($_POST['judul']);
	$sumber		= htmlspecialchars($_POST['sumber']);
	$tempat		= htmlspecialchars($_POST['tempat']);

	if ($gambar != null) {
		$url = "add_galeri.php";
		$gambar = uploadimg($url);
	} else {
		$gambar = 'default-img.png';
	}

	mysqli_query($koneksi, "INSERT INTO tbl_galeri VALUES('','$gambar','$judul','$sumber','$tempat')");

	echo "<script>
			alert('Data berhasil disimpan');
			document.location.href= 'add-galeri.php';
		</script>";
	return;
} else if (isset($_POST['update'])) {
	$id_galeri	= $_POST['id_galeri'];
	$gambar		= htmlspecialchars($_FILES['gambarLama']);
	$judul		= htmlspecialchars($_POST['judul']);
	$sumber		= htmlspecialchars($_POST['sumber']);
	$tempat		= htmlspecialchars($_POST['tempat']);

	if ($_FILES['image']['error'] === 4) {
		$gambarGaleri = $gambar;
	} else {
		$url = "galeri.php";
		$gambarGaleri = uploadimg($url);
		if ($gambar != 'default-img.png') {
			@unlink('../assets/images/' . $gambar);
		}
	}

	mysqli_query($koneksi, "UPDATE tbl_galeri SET
		gambar 	= '$gambarGaleri',
		sumber 	= '$sumber',
		tempat 	= '$tempat'
		WHERE id_galeri = '$id_galeri'	
		");

	echo "<script>
 			alert('Data berhasil diperbarui');
 			document.location.href= 'galeri.php';
		</script>";
	return;
}
