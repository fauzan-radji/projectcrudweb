<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
</head>

<body>
  <h1>Daftar wengdev KSL</h1>
  <table border="1" cellspacing="0" cellpadding="5">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Pekerjaan</th>
      <th>Aksi</th>
    </tr>
    <?php $no = 1;
    foreach ($users as $user) : ?>
      <tr>
        <td><?= $no ?>.</td>
        <td><?= $user['nama'] ?></td>
        <td><?= $user['pekerjaan'] ?></td>
        <td>
          <a href="<?= base_url('/users/' . $user['id']) ?>">Detail</a>
          <button>Edit</button>
          <button>Hapus</button>
        </td>
      </tr>
    <?php $no++;
    endforeach ?>
  </table>
</body>

</html>