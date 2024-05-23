<?php
include "koneksi.php";

// Ambil data dari AJAX
$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];

// Query untuk update data
$sql = "UPDATE datamhs SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', prodi='$prodi' WHERE id_mhs=$id";

if ($koneksi->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$koneksi->close();
?>
