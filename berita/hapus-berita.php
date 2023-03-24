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


$id_berita	= $_GET['id_berita'];
$gambar = $_GET['gambar'];

mysqli_query($koneksi, "DELETE FROM tbl_berita WHERE id_berita = '$id_berita'");
if ($gambar != 'default-img.png') {
	unlink('../assets/images/' . $gambar);
}

echo "<script>
		alert('Berita berhasil dihapus..');
		document.location.href='berita';
	</script>";
return;
