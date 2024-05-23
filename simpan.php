<?php 
    include('koneksi.php');    
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];    
    mysqli_query($koneksi,"insert into datamhs values(NULL, '$nim','$nama','$kelamin','$alamat','$prodi')");
    
?>