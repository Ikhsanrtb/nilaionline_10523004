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
        <h2>Tambah Data Nilai</h2>
    </center>
    <hr/><br/>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required />
                </div>

                <div class="form-group">
                    <label for="nip">NIP Dosen</label>
                    <input type="text" name="nip" id="nip" placeholder="Masukkan NIP Dosen" required />
                </div>

                <div class="form-group">
                    <label for="nl_tugas">Nilai Tugas</label>
                    <input type="number" name="nl_tugas" id="nl_tugas" step="0.01" placeholder="Masukkan Nilai Tugas" required />
                </div>

                <div class="form-group">
                    <label for="nl_uts">Nilai UTS</label>
                    <input type="number" name="nl_uts" id="nl_uts" step="0.01" placeholder="Masukkan Nilai UTS" required />
                </div>

                <div class="form-group">
                    <label for="nl_uas">Nilai UAS</label>
                    <input type="number" name="nl_uas" id="nl_uas" step="0.01" placeholder="Masukkan Nilai UAS" required />
                </div>

                <div class="form-group btn-group">
                    <button type="submit" name="submit" class="btn-submit">Tambah</button>
                    <a href="./?adm=nilai" class="btn-back">Kembali</a>
                </div>
            </form>
        </div>
    <?php
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
            $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
            $nl_tugas = mysqli_real_escape_string($koneksi, $_POST['nl_tugas']);
            $nl_uts = mysqli_real_escape_string($koneksi, $_POST['nl_uts']);
            $nl_uas = mysqli_real_escape_string($koneksi, $_POST['nl_uas']);

            // Cek apakah data nilai sudah ada untuk NIM dan NIP tertentu
            $cekData = "SELECT * FROM nilai WHERE nim='$nim' AND nip='$nip'";
            $result = mysqli_query($koneksi, $cekData);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('⚠️ Data nilai untuk mahasiswa ini sudah ada!'); window.location='./?adm=nilai';</script>";
            } else {
                // Insert data jika belum ada
                $queryAdd = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) 
                            VALUES ('$nim', '$nip', '$nl_tugas', '$nl_uts', '$nl_uas')";

                if (mysqli_query($koneksi, $queryAdd)) {
                    echo "<script>alert('✅ Data nilai berhasil ditambahkan!'); window.location='./?adm=nilai';</script>";
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
