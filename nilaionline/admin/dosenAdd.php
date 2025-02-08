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
        <h2>Tambah Data Dosen</h2>
    </center>
    <hr/><br/>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" placeholder="Masukkan NIP" required />
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" required />
                </div>

                <div class="form-group">
                    <label for="kode_mtkul">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mtkul" id="kode_mtkul" placeholder="Masukkan Kode Mata Kuliah" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" required />
                </div>

                <div class="form-group btn-group">
                    <button type="submit" name="submit" class="btn-submit">Tambah</button>
                    <a href="./?adm=dosen" class="btn-back">Kembali</a>
                </div>
            </form>
        </div>
    <?php
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
            $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
        
            // Cek apakah NIP sudah ada di database
            $cekNIP = "SELECT * FROM dosen WHERE nip = '$nip'";
            $result = mysqli_query($koneksi, $cekNIP);
        
            if (mysqli_num_rows($result) > 0) {
                // Jika NIP sudah terdaftar, tampilkan pesan
                echo "<script>alert('⚠️ NIP sudah terdaftar! Gunakan NIP lain.'); window.location='./?adm=dosenAdd';</script>";
            } else {
                // Jika NIP belum ada, lakukan insert data
                $queryAdd = "INSERT INTO dosen (nip, nama, kode_mtkul, password) 
                             VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
                
                if (mysqli_query($koneksi, $queryAdd)) {
                    echo "<script>alert('✅ Data dosen berhasil ditambahkan!'); window.location='./?adm=dosen';</script>";
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

    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
