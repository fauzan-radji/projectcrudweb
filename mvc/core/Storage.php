<?php

namespace Core;

class Storage
{
  public static function upload($file)
  {
    $targetDir = ROOT . 'uploads/';
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $targetFile = $targetDir . uniqid(rand()) . ".$imageFileType";

    // Check if image file is a actual image or fake image
    if (!getimagesize($file['tmp_name'])) {
      return [
        'error' => 'File yang diapload bukan gambar',
        'filename' => ''
      ];
    }

    // Allow certain file formats
    $allowed = ['jpg', 'jpeg', 'png'];
    if (!in_array($imageFileType, $allowed)) {
      return [
        'error' => 'Maaf. Hanya file ' . implode(', ', $allowed) . ' yang diperbolehkan',
        'filename' => ''
      ];
    }

    // actually upload the file
    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
      return [
        'error' => 'Maaf. Hanya file ' . implode(', ', $allowed) . ' yang diperbolehkan',
        'filename' => ''
      ];
    }

    return [
      'error' => 0,
      'filename' => basename($targetFile)
    ];
  }

  public static function delete($filename)
  {
    return unlink(ROOT . 'uploads/' . $filename);
  }
}
