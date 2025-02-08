<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>

<?php
include('../koneksi/koneksi.php');

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('❌ Data dosen tidak ditemukan!'); window.location='./?adm=dosen';</script>";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_mtkul']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $data['password'];

    $queryUpdate = "UPDATE dosen SET nama = '$nama', kode_mtkul = '$kode_mtkul', password = '$password' WHERE nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('✅ Data dosen berhasil diperbarui!'); window.location='./?adm=dosen';</script>";
    } else {
        echo "<script>alert('❌ Gagal mengupdate data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="content-wrapper">
    <center>
        <h2>Edit Data Dosen</h2>
    </center>
    <hr/><br/>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" value="<?php echo $data['nip']; ?>" readonly />
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required />
            </div>

            <div class="form-group">
                <label for="kode_mtkul">Kode Mata Kuliah</label>
                <input type="text" name="kode_mtkul" id="kode_mtkul" value="<?php echo $data['kode_mtkul']; ?>" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Kosongkan jika tidak ingin mengubah" />
            </div>

            <div class="form-group btn-group">
                <button type="submit" class="btn-submit">Update</button>
                <a href="./?adm=dosen" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
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
