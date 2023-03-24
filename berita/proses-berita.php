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
	header("Location:$main_url");
	exit;
}



if (isset($_POST['simpan'])) {
	$judul		= htmlspecialchars($_POST['judul']);
	$gambar		= htmlspecialchars($_FILES['image']['name']);
	$isiberita		= htmlspecialchars($_POST['isiberita']);
	$tanggal		= htmlspecialchars($_POST['tanggal']);

	if ($gambar != null) {
		$url = "add-berita.php";
		$gambar = uploadimg($url);
	} else {
		$gambar = 'default-img.png';
	}

	mysqli_query($koneksi, "INSERT INTO tbl_berita VALUES('','$judul','$gambar','$isiberita','$tanggal')");

	echo "<script>
			alert('Data berhasil disimpan');
			document.location.href= 'add-berita.php';
		</script>";
	return;
} else if (isset($_POST['update'])) {
	$judul		= htmlspecialchars($_POST['judul']);
	$gambar		= htmlspecialchars($_POST['gbrberitaLama']);
	$isiberita	= htmlspecialchars($_POST['isiberita']);
	$tanggal	= htmlspecialchars($_POST['tanggal']);

	// cek gambar yang diupload
	if ($_FILES['image']['error'] === 4) {
		$gambarBerita = $gambar;
	} else {
		$url = 'berita.php';
		$gambarBerita = uploadimg($url);
		if ($gambar != 'default-img.png') {
			@unlink('../assets/images/' . $gambar);
		}
	}

	// update data
	mysqli_query($koneksi, "UPDATE tbl_berita SET
							judul 		= '$judul',
							gambar 		= '$gambarBerita',
							isiberita 	= '$isiberita',
							tanggal		= '$tanggal'
							WHERE 	id_berita = '$id_berita'
							");
	echo "<script>
			alert('Data berhasil diperbarui');
			document.location.href= 'berita.php';
		</script>";
	return;
}
