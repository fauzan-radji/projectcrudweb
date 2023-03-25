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

if ($rowSession["level"] === "user") {
	header("Location: " . app_url());
	exit;
}

$id_proker	= $_GET['id_proker'];

mysqli_query($koneksi, "DELETE FROM tbl_proker WHERE id_proker = '$id_proker'");

echo "<script>
		alert('Data berhasil dihapus..');
		document.location.href='proker';
	</script>";
return;
header("location:proker");
