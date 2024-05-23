<?php
// Langkah 1: Terhubung ke database
include "koneksi.php";

// Langkah 2: Ambil data pengguna dari database
$id = $_GET['id']; // Ambil ID pengguna dari parameter URL
$sql = "SELECT * FROM datamhs WHERE id_mhs = $id";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Langkah 3: Isi nilai-nilai formulir dengan data yang diambil
    $nim = $row['nim'];
    $nama = $row['nama'];
    $kelamin = $row['jenis_kelamin'];
    $alamat = $row['alamat'];
    $prodi = $row['prodi'];
} else {
    echo "Data tidak ditemukan";
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <center>
            <h2>EDIT DATA MAHASISWA</h2>
        </center>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <form id="form_input">
                        <div class="card-body">
                            <input type="hidden" id="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Nim" value="<?php echo $nim; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option>--pilih--</option>
                                    <option value="Laki - laki" <?php if ($kelamin == 'Laki - laki') echo 'selected'; ?>>Laki - laki</option>
                                    <option value="Perempuan" <?php if ($kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <select name="prodi" class="form-control" id="prodi">
                                    <option>--pilih--</option>
                                    <option value="S1 Informatika" <?php if ($prodi == 'S1 Informatika') echo 'selected'; ?>>S1 Informatika</option>
                                    <option value="S1 Farmasi" <?php if ($prodi == 'S1 Farmasi') echo 'selected'; ?>>S1 Farmasi</option>
                                </select>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" id="tombol_edit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" href="index.php">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
            <script>
                $(document).ready(function() {
                    $('#form_input').validate({ // Validasi form menggunakan plugin jQuery Validation
                        rules: {
                            nim: {
                                required: true
                            },
                            nama: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                            prodi: {
                                required: true
                            }
                        },
                        messages: {
                            nim: {
                                required: "NIM wajib diisi"
                            },
                            nama: {
                                required: "Nama wajib diisi"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin wajib dipilih"
                            },
                            alamat: {
                                required: "Alamat wajib diisi"
                            },
                            prodi: {
                                required: "Program Studi wajib dipilih"
                            }
                        },
                        submitHandler: function(form) {
                            var id = $('#id').val();
                            var nim = $('#nim').val();
                            var nama = $('#nama').val();
                            var jenis_kelamin = $('#jenis_kelamin').val();
                            var alamat = $('#alamat').val();
                            var prodi = $('#prodi').val();

                            $.ajax({
                                type: 'POST',
                                url: 'update_data.php', // Ganti dengan nama file yang akan menangani update data
                                data: {
                                    id: id,
                                    nim: nim,
                                    nama: nama,
                                    jenis_kelamin: jenis_kelamin,
                                    alamat: alamat,
                                    prodi: prodi
                                },
                                success: function(response) {
                                    if (response == 'success') {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: 'Data berhasil diperbarui.',
                                            icon: 'success',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = 'index.php'; // Redirect ke halaman index setelah berhasil disimpan
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Gagal memperbarui data.',
                                            icon: 'error',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            </script>

</body>

</html>