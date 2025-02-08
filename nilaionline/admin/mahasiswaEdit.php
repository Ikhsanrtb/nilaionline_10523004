<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>

<?php
include('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$queryMhs = "SELECT * FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($koneksi, $queryMhs);
mysqli_stmt_bind_param($stmt, "s", $getNim);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$dataMhs = mysqli_fetch_assoc($result);

if (!$dataMhs) {
    echo "<script>alert('Mahasiswa tidak ditemukan!'); window.location='./?adm=mahasiswa';</script>";
    exit;
}
?>

<div class="content-wrapper">
    <center>
        <h2>Ubah Data Mahasiswa</h2>
    </center>
    <hr/><br/>

    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" value="<?php echo $dataMhs['nim']; ?>" readonly />
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $dataMhs['nama']; ?>" required />
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] == 'Laki-Laki') ? 'checked' : ''; ?> required /> Laki-Laki
                        </label>
                        <label>
                            <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'checked' : ''; ?> /> Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jur">Jurusan</label>
                    <select name="jurusan" id="jur" required>
                        <option value="<?php echo $dataMhs['jur']; ?>" selected><?php echo $dataMhs['jur']; ?></option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Baru" />
                </div>

                <div class="form-group btn-group">
                    <button type="submit" name="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="./?adm=mahasiswa" class="btn-back">Kembali</a>
                </div>
            </form>
        </div>
    <?php
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $jk = mysqli_real_escape_string($koneksi, $_POST['jk']);
            $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
            $password = $_POST['password'];

            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $queryUpdate = "UPDATE mahasiswa SET nama=?, jk=?, jur=?, password=? WHERE nim=?";
                $stmt = mysqli_prepare($koneksi, $queryUpdate);
                mysqli_stmt_bind_param($stmt, "sssss", $nama, $jk, $jurusan, $hashed_password, $getNim);
            } else {
                $queryUpdate = "UPDATE mahasiswa SET nama=?, jk=?, jur=? WHERE nim=?";
                $stmt = mysqli_prepare($koneksi, $queryUpdate);
                mysqli_stmt_bind_param($stmt, "ssss", $nama, $jk, $jurusan, $getNim);
            }

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('✅ Data mahasiswa berhasil diperbarui!'); window.location='./?adm=mahasiswa';</script>";
            } else {
                echo "<script>alert('❌ Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
            }

            mysqli_stmt_close($stmt);
        }
    }
    ?>
</div>

<style>
    .content-wrapper {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: #fff;
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
