<?php 
    include('koneksi.php');    
    $id = $_POST['id'];
    mysqli_query($koneksi,"delete from datamhs where id_mhs='$id'");
    
?>