<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>

<?php
include "../koneksi/koneksi.php";

$queryNilai = "SELECT 
    m.nim, 
    m.nama, 
    n.nl_tugas, 
    n.nl_uts, 
    n.nl_uas,
    (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir,
    d.nip, 
    d.nama AS nama_dosen
FROM nilai n
LEFT JOIN mahasiswa m ON n.nim = m.nim
LEFT JOIN dosen d ON n.nip = d.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<div class="container">
    <center>
    <img src="nilai.png" alt="Logo Nilai" class="logo">
        <h2>📜DATA NILAI</h2>
        <a href="nilaiAdd.php" class="btn-add">➕ TAMBAH DATA NILAI</a>
    </center>

    <table>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TUGAS</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>NILAI AKHIR</th>
            <th>DOSEN</th>
            <th>AKSI</th>
        </tr>

        <?php
        if ($countNilai > 0) {
            while ($dataNilai = mysqli_fetch_assoc($resultNilai)) {
                echo "<tr>";
                echo "<td>" . $dataNilai['nim'] . "</td>";
                echo "<td>" . $dataNilai['nama'] . "</td>";
                echo "<td>" . $dataNilai['nl_tugas'] . "</td>";
                echo "<td>" . $dataNilai['nl_uts'] . "</td>";
                echo "<td>" . $dataNilai['nl_uas'] . "</td>";
                echo "<td>" . number_format($dataNilai['nilai_akhir'], 2) . "</td>";
                echo "<td>" . $dataNilai['nama_dosen'] . "</td>";
                echo "<td>
                        <a href='nilaiEdit.php?nim=" . $dataNilai['nim'] . "&nip=" . $dataNilai['nip'] . "' class='btn-edit'>✏️ Edit</a> 
                        <a href='nilaiHapus.php?nim=" . $dataNilai['nim'] . "&nip=" . $dataNilai['nip'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>🗑️ Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='no-data'>Belum ada Data Nilai</td></tr>";
        }
        ?>
    </table>
</div>

<style>
    .container {
        width: 90%;
        margin: auto;
        padding: 20px;
        background: rgba(238, 230, 230, 0.81);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h2 {
        color: #333;
        margin-bottom: 5px;
    }

    .btn-add {
        display: inline-block;
        padding: 10px 15px;
        background: #28a745;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .btn-add:hover {
        background: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        background: #343a40;
        color: white;
        padding: 12px;
        text-align: center;
    }

    td {
        padding: 10px;
        color: rgb(0, 0, 0);
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    tr:hover {
        background:rgb(221, 221, 221);
    }

    .btn-edit, .btn-delete {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
        text-decoration: none;
        margin: 3px;
    }

    .btn-edit {
        background: #ffc107;
        color: black;
    }

    .btn-edit:hover {
        background: #e0a800;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    .no-data {
        text-align: center;
        font-weight: bold;
        color: #777;
        padding: 15px;
    }
</style>
