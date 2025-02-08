<?php
include "../koneksi/koneksi.php";


if (isset($_GET['nim']) && isset($_GET['nip'])) {
    $nim = $_GET['nim'];
    $nip = $_GET['nip'];

    
    $queryHapus = "DELETE FROM nilai WHERE nim = '$nim' AND nip = '$nip'";

    
    if (mysqli_query($koneksi, $queryHapus)) {
        
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'index.php'; // Kembali ke halaman index
              </script>";
    } else {
        
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');</script>";
        echo "<script>window.location.href = './?adm=nilai';</script>"; 
    }
} else {
    
    echo "<script>alert('NIM atau NIP tidak diterima');</script>";
    echo "<script>window.location.href = './?adm=nilai';</script>"; 
}
?>
