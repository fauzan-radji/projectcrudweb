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


// Simpan data yang diinput
if (isset($_POST['simpan'])) {
	$judul	= htmlspecialchars($_POST['judul']);
	$gambar	= htmlspecialchars($_FILES['image']['name']);
	$isievent = htmlspecialchars($_POST['isievent']);
	$status	= htmlspecialchars($_POST['status']);
	$tanggal = htmlspecialchars($_POST['tanggal']);

	// Kirim data ke database
	mysqli_query($koneksi, "INSERT INTO tbl_event VALUES('','$judul','$gambar','$isievent','$status','$tanggal')");

	// Alert sukses menambahkan
	echo "<script>
			alert('Data Event berhasil disimpan');
			document.location.href = 'add-event.php';
		</script>";
	return;
} else if (isset($_POST['update'])) {
	$id_event	= $_POST['id_event'];
	$judul	= htmlspecialchars($_POST['judul']);
	$gambar	= htmlspecialchars($_FILES['image']['name']);
	$isievent = htmlspecialchars($_POST['isievent']);
	$status	= htmlspecialchars($_POST['status']);
	$tanggal = htmlspecialchars($_POST['tanggal']);



	mysqli_query($koneksi, "UPDATE tbl_event SET
							judul	= '$judul',
							gambar	= '$gambar',
							isievent	= '$isievent',
							status		= '$status',
							tanggal	= '$tanggal'
							WHERE id_proker = '$id_proker'
							");

	echo "<script>
			alert('Program kerja berhasil diupdate');
			document.location.href='event.php';
		</script>";
	return;
}
