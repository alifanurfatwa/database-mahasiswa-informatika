<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD AJAX PHP MYSQLI </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

</head>

<body>
    <br>
    <div class="container">
        <center>
            <h2>Data Mahasiswa</h2>
        </center>
        <div class="row">
            <div class="col">
                <div id="tampil_data">
                    <a class="btn btn-success" href="tambah.php"><i class="fa fa-plus"></i> Tambah</a>
                    <table id="myTable" class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nim</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $data = mysqli_query($koneksi, "SELECT * FROM datamhs");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nim']; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['jenis_kelamin']; ?></td>
                                    <td><?php echo $d['alamat']; ?></td>
                                    <td><?php echo $d['prodi']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $d['id_mhs']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                        <button id="<?php echo $d['id_mhs']; ?>" class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i> Hapus </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>

<script>
    $(document).on('click', '.hapus_data', function() {
        var id = $(this).attr('id');
        // Tambahkan konfirmasi alert
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                type: 'POST',
                url: "hapus.php",
                data: {
                    id: id
                },
                success: function(response) {
                    //setelah simpan data, update data terbaru
                    window.location.href = "index.php";
                }
            });
        }
    });


    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>