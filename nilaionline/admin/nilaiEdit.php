<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>

<?php
include('../koneksi/koneksi.php');

if (isset($_GET['nim']) && isset($_GET['nip'])) {
    $nim = $_GET['nim'];
    $nip = $_GET['nip'];

    $query = "SELECT * FROM nilai WHERE nim = '$nim' AND nip = '$nip'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('❌ Data tidak ditemukan!'); window.location='./?adm=nilai';</script>";
        exit();
    }
} else {
    echo "<script>alert('⚠️ NIM atau NIP tidak valid!'); window.location='./?adm=nilai';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nl_tugas = $_POST['nl_tugas'];
    $nl_uts = $_POST['nl_uts'];
    $nl_uas = $_POST['nl_uas'];

    // Validasi nilai (0-100)
    if ($nl_tugas < 0 || $nl_tugas > 100 || $nl_uts < 0 || $nl_uts > 100 || $nl_uas < 0 || $nl_uas > 100) {
        echo "<script>alert('❌ Nilai harus antara 0 - 100!'); window.location='./?adm=nilaiEdit=$nim&nip=$nip';</script>";
        exit();
    }

    $queryUpdate = "UPDATE nilai SET nl_tugas = '$nl_tugas', nl_uts = '$nl_uts', nl_uas = '$nl_uas' 
                    WHERE nim = '$nim' AND nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('✅ Data berhasil diperbarui!'); window.location='./?adm=nilai';</script>";
    } else {
        echo "<script>alert('❌ Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="content-wrapper">
    <center>
        <h2>Edit Data Nilai</h2>
    </center>
    <hr/><br/>

    <div class="form-container">
        <form method="post">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" value="<?php echo $data['nim']; ?>" readonly />
            </div>

            <div class="form-group">
                <label for="nip">NIP Dosen</label>
                <input type="text" name="nip" id="nip" value="<?php echo $data['nip']; ?>" readonly />
            </div>

            <div class="form-group">
                <label for="nl_tugas">Nilai Tugas</label>
                <input type="number" name="nl_tugas" id="nl_tugas" value="<?php echo $data['nl_tugas']; ?>" min="0" max="100" required />
            </div>

            <div class="form-group">
                <label for="nl_uts">Nilai UTS</label>
                <input type="number" name="nl_uts" id="nl_uts" value="<?php echo $data['nl_uts']; ?>" min="0" max="100" required />
            </div>

            <div class="form-group">
                <label for="nl_uas">Nilai UAS</label>
                <input type="number" name="nl_uas" id="nl_uas" value="<?php echo $data['nl_uas']; ?>" min="0" max="100" required />
            </div>

            <div class="form-group btn-group">
                <button type="submit" class="btn-submit">Update</button>
                <a href="./?adm=nilai" class="btn-back">Batal</a>
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
