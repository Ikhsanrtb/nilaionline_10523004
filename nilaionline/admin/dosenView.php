<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="/nilaionline_10523004/images/logoicon.ico"> 
</head>
</html>

<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
?>

<div class="container">
    <center>
    <img src="lecture.png" alt="Logo Dosen" class="logo">
        <h2>📜DATA DOSEN</h2>
        <a href="dosenAdd.php" class="btn-add">➕ TAMBAH DATA DOSEN</a>
    </center>

    <table>
        <tr>
            <th>NIP</th>
            <th>NAMA</th>
            <th>KODE MATKUL</th>
            <th>AKSI</th>
        </tr>

        <?php
        if ($countDosen > 0) {
            while ($dataDosen = mysqli_fetch_assoc($resultDosen)) {
                echo "<tr>";
                echo "<td>" . $dataDosen['nip'] . "</td>";
                echo "<td>" . $dataDosen['nama'] . "</td>";
                echo "<td>" . $dataDosen['kode_mtkul'] . "</td>";
                echo "<td>
                        <a href='dosenEdit.php?nip=" . $dataDosen['nip'] . "' class='btn-edit'>✏️ Edit</a> 
                        <a href='dosenHapus.php?nip=" . $dataDosen['nip'] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\)'>🗑️ Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='no-data'>Belum ada Data Dosen</td></tr>";
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
        color:rgb(0, 0, 0);
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
