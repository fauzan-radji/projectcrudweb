<?php

include 'helper.php';

// koneksi
$hostname = env('DB_HOST', 'localhost');
$username = env('DB_USER', 'root');
$password = env('DB_PASS', '');
$database = env('DB_NAME', 'db_projectcrudweb');
$koneksi = mysqli_connect($hostname, $username, $password, $database);

// cek koneksi
// if (mysqli_connect_errno()) {
// echo "Gagal koneksi ke database";
// } else {
// echo "berhasil terhubung";
// }

// url induk
$main_url = "http://localhost/projectcrudweb/";

// function query
function query($query)
{
	global $koneksi;

	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function uploadimg($url)
{
	$namafile	= $_FILES['image']['name'];
	$ukuran		= $_FILES['image']['size'];
	$error		= $_FILES['image']['error'];
	$tmp		= $_FILES['image']['tmp_name'];

	// cek file yg diupload
	$validExtension = ['jpg', 'jpeg', 'png'];
	$fileExtension = explode('.', $namafile);
	$fileExtension = strtolower(end($fileExtension));
	if (!in_array($fileExtension, $validExtension)) {
		header("location:" . $url . '?msg=notimage');
		die;
	}

	// cek ukuran gambar
	if ($ukuran > 1000000) {
		header("location:" . $url . '?msg=oversize');
		die;
	}

	// generate nama file gambar
	if ($url == 'add-profil.php') {
		$namafilebaru = rand(0, 50) . '-bgLogin.' . $fileExtension;
	} else {
		$namafilebaru = rand(10, 1000) . '-' . $namafile;
	}

	// upload gambar
	move_uploaded_file($tmp, "../assets/images/" . $namafilebaru);
	return $namafilebaru;
}


// Function Update Profile
function updateProfile($data)
{
	global $koneksi;

	$id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$oldFile = htmlspecialchars($data["img_old"]);

	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $oldFile;
	} else {
		$gambar = uploadImageAccount();
	}

	// query 
	$query = "UPDATE tbl_user SET
	nama = '$nama',
	username = '$username',
	gambar = '$gambar'
	WHERE id = '$id'
	";

	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function uploadImageAccount()
{

	$fileName = $_FILES['gambar']['name'];
	$fileSize = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada file yang diupload atau tidak
	if ($error === 4) {
		echo "
		<script>
			alert('Foto Perusahaan Atau Instansi Wajib Diupload');
      document.location.href = 'register';
		</script>";
		return false;
	}

	// cek apakah yang diupload adalah file
	$extensionFileValid = ['jpg', 'jpeg', 'png'];
	$extensionFile = explode('.', $fileName);
	$extensionFile = strtolower(end($extensionFile));
	if (!in_array($extensionFile, $extensionFileValid)) {
		echo "
		<script>
			alert('Yang anda upload bukan format file yang diminta');
      document.location.href = '';
		</script>";
		return false;
	}

	// cek ukuran file file yang diupload
	if ($fileSize > 1000000) {
		echo "
		<script>
			alert('Ukuran file terlalu besar');
      document.location.href = '';
		</script>";
		return false;
	}

	// lolos pengecekan, file siap di upload
	// generate nama file baru
	$newFileName = uniqid($fileName . '_');
	$newFileName .= '.';
	$newFileName .= $extensionFile;

	move_uploaded_file($tmpName, '../assets/images/' . $newFileName);
	return $newFileName;
}


function updatePassword($data)
{
	global $koneksi;

	$id = htmlspecialchars(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data["id"]))))))))));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

	// Confirmation Password
	if ($password !== $password2) {
		echo "
		<script>
			alert('Konfirmasi password tidak sesuai!');
			document.location.href = '';
		</script>
		";
		return false;
	}

	// Encription Password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// query 
	$query = "UPDATE tbl_user SET
	password = '$password',
	password2 = '$password2'
	WHERE id = '$id'
	";

	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}
