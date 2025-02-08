<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>


<?php
include('../koneksi/koneksi.php');
?>

<div class="content-wrapper">
    <center>
        <h2>Tambah Data Mahasiswa</h2>
    </center>
    <hr/><br/>
    

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required />
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required />
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="jk" value="Laki-Laki" required /> Laki-Laki
                        </label>
                        <label>
                            <input type="radio" name="jk" value="Perempuan" /> Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jur">Jurusan</label>
                    <select name="jurusan" id="jur" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" required />
                </div>

                <div class="form-group btn-group">
                    <button type="submit" name="submit" class="btn-submit">Tambah</button>
                    <a href="./?adm=mahasiswa" class="btn-back">Kembali</a>
                </div>
            </form>
        </div>
    <?php
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
            $jur = mysqli_real_escape_string($koneksi, $_POST['jur']); 
            $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
        
            // Cek apakah NIM sudah ada di database
            $cekNIM = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
            $result = mysqli_query($koneksi, $cekNIM);
        
            if (mysqli_num_rows($result) > 0) {
                // Jika NIM sudah terdaftar, tampilkan pesan
                echo "<script>alert('⚠️ NIM sudah terdaftar! Gunakan NIM lain.'); window.location='./?adm=mahasiswaAdd';</script>";
            } else {
                // Jika NIM belum ada, lakukan insert data
                $queryAdd = "INSERT INTO mahasiswa (nim, nama, jk, jur, password) 
                             VALUES ('$nim', '$nama', '$jk', '$jur', '$password')";
                
                if (mysqli_query($koneksi, $queryAdd)) {
                    echo "<script>alert('✅ Data mahasiswa berhasil ditambahkan!'); window.location='./?adm=mahasiswa';</script>";
                } else {
                    echo "<script>alert('❌ Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
                }
            }
        } 
    } 
    ?>
</div>

<style>
    .content-wrapper {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: rgb(221, 221, 221);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-container {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .radio-group label {
        display: inline-block;
        margin-right: 10px;
    }

    .btn-group {
        text-align: center;
    }

    .btn-submit {
        background: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-back {
        background: #dc3545;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-submit:hover, .btn-back:hover {
        opacity: 0.8;
    }
</style>
