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

// Simpan data yang diinput
if (isset($_POST['simpan'])) {
	$namakeg	= htmlspecialchars($_POST['namakeg']);
	$tujuankeg	= htmlspecialchars($_POST['tujuankeg']);
	$sasarankeg = htmlspecialchars($_POST['sasarankeg']);
	$danakeg	= htmlspecialchars($_POST['danakeg']);
	$waktukeg	= htmlspecialchars($_POST['waktukeg']);
	$tempatkeg	= htmlspecialchars($_POST['tempatkeg']);

	// Kirim data ke database
	mysqli_query($koneksi, "INSERT INTO tbl_proker VALUES('','$namakeg','$tujuankeg','$sasarankeg','$danakeg','$waktukeg','$tempatkeg')");

	// Alert sukses menambahkan
	echo "<script>
			alert('Program kerja berhasil disimpan');
			document.location.href = 'add-proker.php';
		</script>";
	return;
} else if (isset($_POST['update'])) {
	$id_proker	= $_POST['id_proker'];
	$namakeg	= htmlspecialchars($_POST['namakeg']);
	$tujuankeg	= htmlspecialchars($_POST['tujuankeg']);
	$sasarankeg = htmlspecialchars($_POST['sasarankeg']);
	$danakeg	= htmlspecialchars($_POST['danakeg']);
	$waktukeg	= htmlspecialchars($_POST['waktukeg']);
	$tempatkeg	= htmlspecialchars($_POST['tempatkeg']);

	mysqli_query($koneksi, "UPDATE tbl_proker SET
							namakeg		= '$namakeg',
							tujuankeg	= '$tujuankeg',
							sasarankeg	= '$sasarankeg',
							danakeg		= '$danakeg',
							waktukeg	= '$waktukeg',
							tempatkeg	= '$tempatkeg'
							WHERE id_proker = '$id_proker'
							");

	echo "<script>
			alert('Program kerja berhasil diupdate');
			document.location.href='proker.php';
		</script>";
	return;
}
