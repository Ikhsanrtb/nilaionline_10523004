<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    $queryDelete = "DELETE FROM dosen WHERE nip = '$nip'";

    if (mysqli_query($koneksi, $queryDelete)) {
        echo "<script>alert('Data berhasil dihapus'); window.location='./?adm=dosen';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}
?>
