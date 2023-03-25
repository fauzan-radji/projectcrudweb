<?php

session_start();
if (!isset($_SESSION['ssLogin'])) {
	header('location:../auth/login');
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


$id_event	= $_GET['id_event'];

mysqli_query($koneksi, "DELETE FROM tbl_event WHERE id_event = '$id_event'");

echo "<script>
		alert('Data berhasil dihapus..');
		document.location.href='event';
	</script>";
return;
header("location:proker");
