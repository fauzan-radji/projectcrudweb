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
	header("Location:$main_url");
	exit;
}

$id_galeri		= $_GET['id_galeri'];
$gambar = $_GET['gambar'];

mysqli_query($koneksi, "DELETE FROM tbl_galeri WHERE id_galeri = '$id_galeri'");
if ($gambar != 'default-img.png') {
	unlink('../assets/images/' . $gambar);
}

echo "<script>
		alert('Program kerja berhasil dihapus..');
		document.location.href='galeri';
	</script>";
return;
