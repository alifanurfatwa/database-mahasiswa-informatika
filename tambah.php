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
            <h2>INPUT DATA MAHASISWA</h2>
        </center>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <form id="form_input">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Nim">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option>--pilih--</option>
                                    <option value="Laki - laki">Laki - laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <select name="prodi" class="form-control" id="prodi">
                                    <option>--pilih--</option>
                                    <option value="S1 Informatika">S1 Informatika</option>
                                    <option value="S1 Farmasi">S1 Farmasi</option>
                                </select>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" id="tombol_simpan" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="index.php">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>

            <script>
                $("#tombol_simpan").click(function() {
                    //validasi form
                    $('#form_input').validate({
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

                        // alert(nama);
                        //jika validasi sukses maka lakukan
                        submitHandler: function(form) {
                            $.ajax({
                                type: 'POST',
                                url: "simpan.php",
                                data: $('#form_input').serialize(),
                                success: function() {
                                    // Setelah simpan data, arahkan pengguna kembali ke index.php
                                    window.location.href = "index.php";
                                }
                            });
                            //kosongkan form nama dan jurusan
                            document.getElementById("nim").value = "";
                            document.getElementById("nama").value = "";
                            document.getElementById("jenis_kelamin").value = "";
                            document.getElementById("kontak").value = "";
                            document.getElementById("alamat").value = "";
                            return false;
                        }
                    });
                });
            </script>
</body>

</html>